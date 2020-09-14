<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// CHECKS IF USER IS LOGGED IN
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECKS IF $_GET IS THERE
if(empty($_GET) || is_null($_GET['id'])) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
    exit;
}

$accountID = '';

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $accountID = validate($_GET["id"]);
  }

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

if($stmt = $con->prepare(" SELECT id, displayName, email, communityRank, permissionRank, recruitmentRank, profileBanner FROM accounts WHERE id = ? ")) {
    $stmt->bind_param("s", $accountID);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        $stmt->bind_result($id, $displayName, $email, $communityRank, $permissionRank, $recruitmentRank, $profileBanner);
        $stmt->fetch();
    
    } else {
        echo "<script>alert('ERROR! An error has occured at level 2.');</script>";
        echo '<script type="text/javascript">location.href = "/home/profile/";</script>';
        exit;
    }

} else {
    echo "<script>alert('ERROR! An error has occured at level 1.');</script>";
    echo '<script type="text/javascript">location.href = "/home/profile/";</script>';
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/i/header.php";
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="/home/index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profiles</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php if(isset($displayName)) {echo $displayName;}?>
                            </li>
                        </ol>
                    </nav>
                <div class="row">
                    <div class="col-md-9">
                        <center>
                            <?php 
                                if(!isset($profileBanner)) {
                                    echo '<img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br>';
                                } else {
                                    echo '<img style="width:100%;height:auto;"src="';
                                    echo $profileBanner;
                                    echo '"><br>';
                                }
                            ?>
                        </center>
                        
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="card-header">Account Activity</div>
                                    <div class="card-body">

                                        <?php

                                            if($stmt = $con->prepare(" SELECT activityDetails FROM accountactivity WHERE account = ? ")) {
                                                if($stmt->bind_param("s", $accountID)) {
                                                    if($stmt->execute()) {
                                                        if($stmt->store_result()) {
                                                            if($stmt->num_rows > 0) {
                                                                $stmt->bind_result($activityDetails);
                                                                while($stmt->fetch()) {
                                                                    echo $activityRow['activityDetails'];
                                                                    echo '<br>';
                                                                }
                                                                
                                                            } else {
                                                                echo 'There is no activity logs for this profile.';
                                                            }
                                                            
                                                        } else {
                                                            echo "<script>alert('ERROR! An error has occured at level 4.');</script>";
                                                            echo '<script type="text/javascript">location.href = "/profile/";</script>';
                                                            exit;
                                                        }
                                                        
                                                    } else {
                                                        echo "<script>alert('ERROR! An error has occured at level 3.');</script>";
                                                        echo '<script type="text/javascript">location.href = "/profile/";</script>';
                                                        exit;
                                                    }
                                                    
                                                } else {
                                                    echo "<script>alert('ERROR! An error has occured at level 2.-');</script>";
                                                    echo '<script type="text/javascript">location.href = "/profile/";</script>';
                                                    exit;
                                                }
                                                

                                            } else {
                                                echo "<script>alert('ERROR! An error has occured at level 1.');</script>";
                                                echo '<script type="text/javascript">location.href = "/profile/";</script>';
                                                exit;
                                            }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Profile Information</h4>
                                <br>
                                <p>
                                    Name: <strong><?php echo $displayName; ?></strong>
                                    <br>
                                    Rank: <strong><?php echo $communityRank; ?></strong>
                                </p>
                                <br>
                                <a class="btn btn-primary btn-block" type="button" href="/profile/settings/">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br>

                <div class="card">
                    <div class="card-header">
                        <center>DownSouthRP Community - 2020</center>
                    </div>
                </div>

                <br><br>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>