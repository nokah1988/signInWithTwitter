<?php





class DB {
    protected $mysqli;
    
    public function __construct() {
        
        $host = 'localhost';
        $user = 'root';
        $password = '8se4738P';
        $database = 'signInWithTwitter';       
        
        $this->mysqli = new mysqli($host, $user, $password, $database);
    }
    
    public function query($sql) {
        
        return $this->mysqli->query($sql);
    }

}



