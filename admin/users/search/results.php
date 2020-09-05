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
    $validationSQL = " SELECT * FROM accounts WHERE id = '".$_GET['id']."' ";
    $validationResults = mysqli_query($con, $validationSQL);
    $userRow = mysqli_fetch_assoc($validationResults);
    // CHECKS FOR NUMBER OF ROWS IN RESULT
    if(!is_null($userRow['id']) && $userRow['id'] !== '') {
        $userID = $_GET['id'];
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

                    <!-- ADMIN DASHBOARD BREADCRUM -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/">Admin</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search Results - <?php echo $userRow['displayName']; ?></li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header">Edit Account Informaiton</div>
                                
                                    <div class="card-body">

                                        

                                        <form action="/sys/scripts/adminUpdateDisplayName.php?userID=<?php echo $userRow['id']; ?>&return=/admin/users/search/results.php?id=<?php echo $userRow['id']; ?>" method="post">
                                            <p class="list-group-item bg-info text-center">Currently: <br><b><?php echo $userRow['displayName']?></b></p>
                                            <label for="newDisplayName">Change Display Name</label>
                                            <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="newDisplayName" id="newDisplayName" required/>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>

                                            </div>
                                        </form>

                                        <br>

                                        <form action="/sys/scripts/adminUpdateEmailAddress.php?userID=<?php echo $userRow['id']; ?>&return=/admin/users/search/results.php?id=<?php echo $userRow['id']; ?>" method="post">
                                            <p class="list-group-item bg-info text-center">Currently: <br><b><?php echo $userRow['email']?></b></p>
                                            <label for="newEmailAddress">Change Email Address</label>
                                            <div class="input-group mb-3">
                                            <input type="email" class="form-control" name="newEmailAddress" id="newEmailAddress" required/>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header">
                                    Featured
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>

                            
                        
                            
                        
                        </div>
                        <div class="col-md-4">

                        
                            <div class="card">
                                <div class="card-header">Community Information</div>
                                    <div class="card-body">
                                        <form action="/sys/scripts/adminUpdateCommunityRank.php?userID=<?php echo $userRow['id']; ?>&return=/admin/users/search/results.php?id=<?php echo $userRow['id']; ?>" method="post">
                                            <!-- COMMUNITY RANK -->
                                            <p class="list-group-item bg-info text-center">Currently: <br><b><?php echo $userRow['communityRank']?></b></p>
                                            <label for="newCommunityRank">Change Community Rank</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="newCommunityRank" id="newCommunityRank" required>
                                                    <option selected="selected" disabled>Choose one</option>
                                                    <?php
                                                        foreach($allCommunityDepartmentRanks as $rank) {
                                                            echo '<option value="' . $rank . '">' . $rank . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                        <br>
                                        
                                        <form action="/sys/scripts/adminUpdatePermissionRank.php?userID=<?php echo $userRow['id']; ?>&return=/admin/users/search/results.php?id=<?php echo $userRow['id']; ?>" method="post">
                                            <!-- COMMUNITY RANK -->
                                            <p class="list-group-item bg-info text-center">Currently: <br><b><?php echo $userRow['permissionRank']?></b></p>
                                            <label for="newPermissionRank">Change System Permission</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="newPermissionRank" id="newPermissionRank" required>
                                                    <option selected="selected" disabled>Choose one</option>
                                                    <?php
                                                        foreach($communityRanks as $rank) {
                                                            echo '<option value="' . $rank . '">' . $rank . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>









                    </div>
                </div>
            </div>
        </div>
    </div>
</div>