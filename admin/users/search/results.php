<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

// CHECK IF USER IS LOGGED IN
if(!isset($_SESSION['loggedin']) && is_null($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECK IF USER HAS ADMIN PERMISSIONS (Jr Admin, Admin, Sr. Admin, Core Admin)
if(!isset($permissionRank) || is_null($permissionRank) || empty($permissionRank)) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
} else {
    if(!in_array($permissionRank, $adminRanks)) {
        echo '<script type="text/javascript">location.href = "/home/";</script>';
    }
}

// IF GET IS ISSUE
if(!isset($_GET) && is_null($_GET) && empty($_GET)) {
    echo "<script>alert('This user has not been found.');</script>";
    echo '<script type="text/javascript">location.href = "/admin/users/";</script>';
    exit;
}
// GET USER FROM $_GET
$userID = '';

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $userID = validate($_GET["id"]);
  }

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// SERACH TO MAKE SURE $_GET[userID] IS VALID
$validationSQL = " SELECT * FROM accounts WHERE id = '".$userID."' ";
$validationResults = mysqli_query($con, $validationSQL);
$userRow = mysqli_fetch_assoc($validationResults);
// CHECKS FOR NUMBER OF ROWS IN RESULT
if(!isset($userRow['id']) || is_null($userRow['id']) || empty($userRow['id'])) {
    echo "<script>alert('An error has occured. Try again!');</script>";
    echo '<script type="text/javascript">location.href = "/admin/users/";</script>';
    exit;
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
                                            <input type="text" class="form-control" value="<?php echo $userRow['displayName']?>" name="newDisplayName" id="newDisplayName" required/>
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
                                            <input type="email" class="form-control" value="<?php echo $userRow['email']?>" name="newEmailAddress" id="newEmailAddress" required/>
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
                                <div class="card-header">Community Information & Permissions</div>
                                    <div class="card-body">
                                        <form action="/sys/scripts/adminUpdateCommunityRank.php?userID=<?php echo $userRow['id']; ?>&return=/admin/users/search/results.php?id=<?php echo $userRow['id']; ?>" method="post">
                                            <!-- COMMUNITY RANK -->
                                            <p class="list-group-item bg-info text-center">Currently: <br><b><?php echo $userRow['communityRank']?></b></p>
                                            <label for="newCommunityRank">Change Community Rank</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="newCommunityRank" id="newCommunityRank" required>
                                                    <option selected="selected" disabled><?php echo $userRow['communityRank']?></option>
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
                                                    <option selected="selected" disabled><?php echo $userRow['permissionRank']?></option>
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
                                        
                                        <br>
                                        
                                        <form action="/sys/scripts/adminUpdateRecruitmentRank.php?userID=<?php echo $userRow['id']; ?>&return=/admin/users/search/results.php?id=<?php echo $userRow['id']; ?>" method="post">
                                            <!-- COMMUNITY RANK -->
                                            <p class="list-group-item bg-info text-center">Currently: <br><b><?php echo $userRow['recruitmentRank']?></b></p>
                                            <label for="newRecruitmentRank">Change Recruitment Permission</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="newRecruitmentRank" id="newRecruitmentRank" required>
                                                    <option selected="selected" disabled><?php echo $userRow['recruitmentRank']?></option>
                                                    <?php
                                                        foreach($recruitmentRanks as $rank) {
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
                        
                        <div class="col-md-4"></div>





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>