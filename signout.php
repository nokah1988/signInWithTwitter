<?php

require_once 'app/init.php';

$auth = new twitterAuth($db, $client);

$auth->signOut();

header('Location: index.php');
