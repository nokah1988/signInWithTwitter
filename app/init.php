<?php

session_start();
require_once 'vendor/autoload.php';
require_once 'app/classes/DB.php';
require_once 'app/classes/twitterAuth.php';

$db = new DB; 


$key    = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$secret = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
\Codebird\Codebird::setConsumerKey($key, $secret);

$client= \Codebird\Codebird::getInstance();



