<?php

require_once 'app/init.php';

$auth = new twitterAuth($db, $client);

if ($auth->signedIn()) {
    
    header('Location: index.php');    
}

 else {
     
    die('signed in failed');    
}


