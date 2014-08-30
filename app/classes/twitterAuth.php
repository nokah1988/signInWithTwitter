<?php

class twitterAuth {
    
    protected $db;
    protected  $client;
    
    protected $clientCallback = 'http://192.168.0.184/tutorials/signInWithTwitter/callback.php';
    
    public function __construct(DB $db, \Codebird\Codebird $client) {
        
        $this->db = $db;
        $this->client = new $client;
    }
    
    public function getAuthUrl() {
        
        $this->requestTokens();
        $this->verifyTokens();
        
        return $this->client->oauth_authenticate();
        
    }
    
    public function signedIn() {
        return isset($_SESSION['user_id']);
        
    }
    
    public function signIn() {        
        if ($this->hasCallback()) {            
                $this->verifyTokens();
                
                $reply = $this->client->oauth_accessToken([
                    'oauth_verifier' => $_GET['oauth_verifier']
                ]);
                
                if ($reply->httpstatus === 200) {
                    
                    $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);
                    
                    $_SESSION['user_id'] = $reply->user_id;
                    
                    // store the user here
                    $this->storeUser($reply);
                    
                    return TRUE;
                    
                }
                
                return TRUE;
        }
        
        return FALSE;
    }
    
    public function signOut() {        
        unset($_SESSION['user_id']);        
    }


    
    
    protected function hasCallback() {
        
        return isset($_GET['oauth_verifier']);
        
    }

    public function requestTokens() {
        
        $reply = $this->client->oauth_requestToken([
            'oauth_callback' => $this->clientCallback
        ]);
        
        $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);
    }
    
    protected function storeTokens($token, $tokenSecret) {
        
        $_SESSION['oauth_token']        = $token;
        $_SESSION['oauth_token_secret']  = $tokenSecret;        
    }
    
    protected function verifyTokens() {
        
        $this->client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    }
    
    protected function storeUser($payload) {
        
        $payload->user_id;
        $payload->screen_name;
        $this->db->query("INSERT INTO users (twitter_id, twitter_username)  VALUES ('{$payload->user_id}', '{$payload->screen_name}') ON DUPLICATE KEY UPDATE id = id");
        
    }
}
