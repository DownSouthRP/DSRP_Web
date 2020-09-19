<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getAllUsers.php";

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
                            <h3>User Management Panel</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-header">
                                            User Search
                                        </div>
                                        <div class="card-body">

                                            <form action="/sys/scripts/adminUserSearch.php" method="post">
                                                <div class="input-group mb-3">
                                                    <label for="searchID">Search User by Web ID</label>
                                                    <input type="text" class="form-control" name="searchID" id="searchID" aria-label="Search User">
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
                                <div class="col-md-10">

                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th></th>
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
                                                echo '<tr';
                                                // if($userRow['permissionRank'] == "Core Administration") { echo 'class="table-dark"'; } elseif($userRow['permissionRank'] == "Senior Administration") { echo 'class="table-secondary"'; }
                                                echo '>';
                                                echo '<td>';
                                                
                                                echo '<img style="width:30px;height:30px;" src="';
                                                if($userRow['permissionRank'] == 'Core Administration') {
                                                    echo '/sys/design/imgs/icons/coreAdmin.png';
                                                } elseif($userRow['permissionRank'] == 'Senior Administration') {
                                                    echo '/sys/design/imgs/icons/srAdmin.png';
                                                } elseif($userRow['permissionRank'] == 'Administration') {
                                                    echo '/sys/design/imgs/icons/admin.png';
                                                } elseif($userRow['permissionRank'] == 'Junior Administration') {
                                                    echo '/sys/design/imgs/icons/jrAdmin.png';
                                                } elseif($userRow['permissionRank'] == 'Senior Staff') {
                                                    echo '/sys/design/imgs/icons/srStaff.png';
                                                } elseif($userRow['permissionRank'] == 'Staff') {
                                                    echo '/sys/design/imgs/icons/staff.png';
                                                } elseif($userRow['permissionRank'] == 'Junior Staff') {
                                                    echo '/sys/design/imgs/icons/jrStaff.png';
                                                } elseif($userRow['permissionRank'] == 'Member') {
                                                    echo '/sys/design/imgs/icons/member.png';
                                                } elseif($userRow['permissionRank'] == 'Recruit') {
                                                    echo '/sys/design/imgs/icons/recruit.png';
                                                } elseif($userRow['permissionRank'] == 'Applicant') {
                                                    echo '/sys/design/imgs/icons/new.png';
                                                }
                                                

                                                echo '"';

                                                echo '</td>';
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
                                                echo '<a class="btn btn-sm btn-outline-warning btn-block" href="/admin/users/search/results.php?id=' . $userRow['id'] . '">View / Edit</a>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        ?>

                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                
                </div>

            </div>

<br><br><br>

















        </div>
    </div>
</div>