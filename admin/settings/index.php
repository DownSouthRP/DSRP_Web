<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getDSRPInfo.php";

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

                    <!-- ADMIN DASHBOARD BREADCRUM -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>

                    <div class="card text-center">
                        <div class="card-header">
                            <h3>System Settings Panel</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Application Settings
                                        </div>
                                        <div class="card-body">

                                            <form action="/sys/scripts/adminUpdateSystemApplicationSettings.php" method="post">
                                            <p class="list-group-item bg-info text-center">Currently: <br><b>
                                                <?php 
                                                    if($getDSRPInfoRow['appStatus'] == TRUE) {
                                                        echo 'Currently Open';
                                                    } else {
                                                        echo 'Currently Closed';
                                                    }
                                                ?>
                                            </b></p>
                                            <label for="newSystemApplicationStatus">Change Application Status</label>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary">Close</button>
                                                <button type="button" class="btn btn-secondary">Open</button>
                                            </div>
                                        </form>

                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-9">

                                    -

                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                
                </div>

            </div>



















        </div>
    </div>
</div>