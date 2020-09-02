<!-- Created by the DownSouthRP Development Department -->
<!-- Copywrite 2020 | DSRP | DownSouthRP -->

<!-- 
    FILE INFORMAITON

    THIS FILE AUTOMATICALLY REDIRECTS THE USER FROM THIS PAGE 
    TO THE view.php PAGE GIVING THE URL THEIR ID 
-->

<?php
// PULLS THE CURRENT USER SQL
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
// REDIRECTS WITH URL
echo '<script type="text/javascript">location.href = "view.php?id=' . $getCurrentUserRow['id'] . '";</script>';

?>