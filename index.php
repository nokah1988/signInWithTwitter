<?php

require_once 'app/init.php';

$auth = new twitterAuth($db, $client);

?>

<?php if ($auth->signedIn()); ?>
    <p>Your are signed in. <a href="signout.php">Sign out</a></p>
    
<? else >
    <p><a href="<?php echo $auth->getAuthUrl(); ?>">Sign in with Twitter</a></p>
    
<? endif >
    
    







