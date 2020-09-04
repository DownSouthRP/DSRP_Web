<!-- DOWNSOUTHRP.COM -->
<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DIVISION -->

<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

// GET USER FROM $_GET
$userID = '';
if(isset($_GET) && !is_null($_GET) && !empty($_GET)) {
    // SERACH TO MAKE SURE $_GET[userID] IS VALID
    $validationSQL = " SELECT * FROM accounts WHERE id = '".$_GET['userID']."' ";
    $validationResults = mysqli_query($con, $validationSQL);
    // CHECKS FOR NUMBER OF ROWS IN RESULT
    if($validationResults->num_rows >= 1) {
        $userID = $_GET['userID'];
    } else {
        echo "<script>alert('An error has occured. Try again!');</script>";
        echo '<script type="text/javascript">location.href = "/admin/users/";</script>';
    }
    
    
} else {
    echo "<script>alert('An error has occured. Try again!');</script>";
    echo '<script type="text/javascript">location.href = "/admin/users/";</script>';
}

// START SESSION IF NOT ALREADY STARTED
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// CHECK IF USER IS LOGGED IN
if(!isset($_SESSION['loggedin']) && is_null($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECK IF USER HAS ADMIN PERMISSIONS (Jr Admin, Admin, Sr. Admin, Core Admin)
if(!isset($getCurrentUserRow['permissionRank']) && is_null($getCurrentUserRow['permissionRank']) && empty($getCurrentUserRow['permissionRank'])) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
} else {
    if(!in_array($getCurrentUserRow['permissionRank'], $adminRanks)) {
        echo '<script type="text/javascript">location.href = "/home/";</script>';
    }
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <!-- ADMIN DASHBOARD HEADER -->
            <?php
                include_once $_SERVER['DOCUMENT_ROOT']."/sys/modules/adminHeader.php";
            ?>
            
            <!-- ADMIN DASHBOARD MAIN BODY -->
            <div class="row">
                <!-- ADMIN DASHBOARD SIDEBAR -->    
                <?php
                    include_once $_SERVER['DOCUMENT_ROOT']."/sys/modules/adminSidebar.php";
                ?>
                <!-- ADMIN DASHBOARD CONTENT -->
                <div class="col-md-10">
                
                    
                
                </div>

            </div>
            
        </div>
    </div>
</div>