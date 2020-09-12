<?php

$mailTo = 'andersonbrown833@gmail.com';
$mailSubject = "Confirmation Code";
$mailLink = 'https://' . $_SERVER['HTTP_HOST'] . '/home/auth/confirm.php?e=' . '-email-' . '&h=' . '-hash-';
$mailTxt = "Hello, thank you for registering for dsrp.online." . "Head over to " . $mailLink . " to finish your registration.";
$mailHeaders = "From: <REG@DSRP.ONLINE>";

if(mail($mailTo,$mailSubject,$mailTxt,$mailHeaders)) {
    exit;
}


echo '<script type="text/javascript">location.href = "/home";</script>';
exit;
?>
