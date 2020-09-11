<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/i/header.php";


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
	echo '<script type="text/javascript">location.href = "/home/";</script>';
}

if(empty($_GET) || is_null($_GET['id'])) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
} else {
    $accountID = $_GET['id'];
}

$getUserSQL = " SELECT * FROM accounts WHERE id = '".$accountID."' ";
$getUserResult = mysqli_query($con, $getUserSQL);
$getUserRow = mysqli_fetch_assoc($getUserResult);

if(!isset($getUserRow['id']) || is_null($getUserRow['id'])) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
}

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
                                <?php if(isset($getUserRow['displayName'])) {echo $getUserRow['displayName'];}?>
                            </li>
                        </ol>
                    </nav>
                <div class="row">
                    <div class="col-md-9">
                        <center>
                            <?php 
                                if(!isset($getUserRow['profileBanner'])) {
                                    echo '<img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br>';
                                } else {
                                    echo '<img style="width:100%;height:auto;"src="';
                                    echo $getUserRow['profileBanner'];
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

                                            // GET ACTIVITY LOGS FOR USER
                                            $getAccountActivitySQL = " SELECT * FROM accountactivity WHERE account = '".$accountID."' ";
                                            $getAccountActivityResult = mysqli_query($con, $getAccountActivitySQL);
                                            while($activityRow = mysqli_fetch_array($getAccountActivityResult)) {
                                                echo $activityRow['activityDetails'];
                                                echo '<br>';
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
                                    Name: <strong><?php echo $getUserRow['displayName']?></strong>
                                    <br>
                                    Rank: <strong><?php echo $getUserRow['communityRank']?></strong>
                                </p>
                                <br>
                                <?php
                                    if($accountID == $_SESSION['id']) {
                                        echo '<a class="btn btn-primary btn-block" type="button" href="settings.php">Edit Profile</a>';
                                    } else {
                                        exit;
                                    }
                                
                                ?>
                            </div>
                        </div>
                        <!-- <br>
                        <div class="card">
                            <div class="card-body">
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>