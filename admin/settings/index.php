<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getDSRPInfo.php";


// CHECK IF USER IS LOGGED IN
if(!isset($_SESSION['loggedin']) && is_null($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECK IF USER HAS ADMIN PERMISSIONS (Jr Admin, Admin, Sr. Admin, Core Admin)
if(!isset($permissionRank) && is_null($permissionRank) && empty($permissionRank)) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
} else {
    if(!in_array($permissionRank, $adminRanks)) {
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
                                            
                                            <p class="list-group-item bg-info text-center">Currently: <br><b>
                                                <?php 
                                                    if($getDSRPInfoRow['appStatus'] == 'TRUE') {
                                                        echo 'Currently Open';
                                                    } else {
                                                        echo 'Currently Closed';
                                                    }
                                                ?>
                                            </b></p>
                                            <label for="newSystemApplicationStatus">Change Application Status</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons" role="group">
                                                <form action="/sys/scripts/adminUpdateSystemApplicationSettingsClose.php" method="post">
                                                    <button type="submit" class="btn btn-<?php 
                                                        if($getDSRPInfoRow['appStatus'] == 'TRUE') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        }
                                                    ?>">Close</button>
                                                </form>
                                                <form action="/sys/scripts/adminUpdateSystemApplicationSettingsOpen.php" method="post">
                                                    <button type="submit" class="btn btn-<?php 
                                                        if($getDSRPInfoRow['appStatus'] == 'FALSE') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        }
                                                    ?>">Open</button>
                                                </form>
                                            </div>
                                            

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