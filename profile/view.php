<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION['loggedin'] !== TRUE && is_null($_GET['id'])) {
	echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
}

if(empty($_GET)) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
} else {
    $accountID = $_GET['id'];
}

$getUserSQL = " SELECT * FROM accounts WHERE id = '".$accountID."' ";
$getUserResult = mysqli_query($con, $getUserSQL);
$getUserRow = mysqli_fetch_assoc($getUserResult);

if(is_null($getUserRow['id'])) {
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
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h3 class="card-title"></h3>
                                        <br>
                                        <center>
                                            <?php 
                                                if(!isset($getUserRow['profileBanner'])) {
                                                    echo '<img src="/sys/design/imgs/dsrpLogo.png"><br>';
                                                } else {
                                                    echo '<img style="width:80%;height:auto;"src="';
                                                    echo $getUserRow['profileBanner'];
                                                    echo '"><br>';
                                                }
                                            ?>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h3 class="card-title">Profile Information</h3>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <h5>Profile Link</h5>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" id="profileLink" value="http://downsouthrp.com/profile/view.php?id=<?php echo $getUserRow['id'];?>" disabled/>
                                                    <div class="input-group-append">
                                                        <!-- <button class="btn btn-outline-primary" type="button" id="profileLinkBtn" onclick="copyText()">COPY</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                        <h5></h5>
                                    </div>
                                    <br>
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