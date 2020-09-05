<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getAllUsers.php";

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
                            <h3>User Management Panel</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            User Search
                                        </div>
                                        <div class="card-body">

                                            <form action="/sys/scripts/adminUserSearch.php" method="post">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="searchID" id="searchID" placeholder="Search User by Web ID" aria-label="Search User">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="submit">SEARCH</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="card">
                                        <div class="card-header">
                                            Total Users
                                        </div>
                                        <div class="card-body">
                                            <h4><?php echo $getAllUsersCount[0]; ?> users</h4>
                                            <a class="btn btn-outline-primary btn-block" href="/admin/users/">REFRESH</a>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-9">

                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Web ID</th>
                                            <th>Display Name</th>
                                            <th>Email Address</th>
                                            <th>Community Rank</th>
                                            <th>Permission Rank</th>
                                            <th>EDIT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            while($userRow = mysqli_fetch_array($allUsersResult)) {
                                                echo '<tr>';
                                                echo '<td>';
                                                echo $userRow['id'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo $userRow['displayName'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo $userRow['email'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo $userRow['communityRank'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo $userRow['permissionRank'];
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<a class="btn btn-outline-warning btn-block" href="/admin/users/search/results.php?id=' . $userRow['id'] . '">View / Edit</a>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?>

                                    </tbody>
                                </table>

                                </div>
                            </div>
                            -

                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                
                </div>

            </div>



















        </div>
    </div>
</div>