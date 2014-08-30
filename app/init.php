<?php

session_start();
require_once 'vendor/autoload.php';
require_once 'app/classes/DB.php';
require_once 'app/classes/twitterAuth.php';

$db = new DB; 


$key    = 'cPrwqHdB3vwrTmuzCK1kGqcXn';
$secret = 'Cta5CgEZjLCSsAs98BRDa9UPnfhBRwhL6pbztyaOssuhqcGLzT';
\Codebird\Codebird::setConsumerKey($key, $secret);

$client= \Codebird\Codebird::getInstance();



