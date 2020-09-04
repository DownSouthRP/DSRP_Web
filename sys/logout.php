<!-- Created by the DownSouthRP Development Department -->
<!-- Copywrite 2020 | DSRP | DownSouthRP -->

<!-- 
    FILE INFORMAITON

    THIS FILE LOG THE CURRENT USER OUT AND REDIRECT TO THE HOME PAGE 
-->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {      setcookie(session_name(), '', time() - 3600);    }

    // Destroy the session
    session_destroy();
}

// Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
setcookie('loggedin', '', time() - 3600);
setcookie('id', '', time() - 3600);

echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
?>
