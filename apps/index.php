<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/i/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
	echo '<script type="text/javascript">location.href = "nli.php";</script>';
}

$currentMonth = date('m');
// THIS GETS A COUNT OF ALL APPLICATIONS SUBMITTED BY ONE USER
$allAppsSQL = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' ";
$allAppsResult = mysqli_query($con, $allAppsSQL);
$allAppsRows = mysqli_fetch_array($allAppsResult);

// GET ALL APPS FROM USER THIS CYCLE
$appCurrentCycleSQL = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' AND appMonth = '".$currentMonth."' ";
$appCurrentCycleResult = mysqli_query($con, $appCurrentCycleSQL);
$appCurrentCycleArray = mysqli_fetch_array($appCurrentCycleResult);

// GET ALL APPS FROM USER
$getAllAppArray = " SELECT * FROM apps WHERE appUser = '".$_SESSION['id']."' ";
$getAllResult = mysqli_query($con, $getAllAppArray);

$appCount = $allAppsRows[0];
$currentCycleCount = $appCurrentCycleArray[0];

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <center><img style="width:15%;height:auto;" src="/sys/design/imgs/dsrpLogo.png"><br></center>
                        </div>
                        
                    </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Recruitment Application</h3>
                                <br>
                                <?php
                                    // CHECK IF USER IS AN APPLICANT
                                    if($getCurrentUserRow['communityRank'] !== 'Applicant') {
                                        echo '<br><center><div class="alert alert-danger" role="alert"><b>YOU ARE CURRENTLY A MEMBER, WHY WOULD YOU WANT TO GO THROUGH THIS AGAIN?</b></div></center>';
                                    }
                                    // IF THERE ARE NO APPS FROM USER
                                    if($appCount < '1') {
                                        echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                                    }
                                    // IF THERE IS MORE THAN ONE APP
                                    elseif($currentCycleCount <= '1') {
                                        echo '<a class="btn btn-secondary btn-block" disabled>OPEN NEW APPLICATION</a>';
                                        echo '<br><center><div class="alert alert-danger" role="alert"><b>YOU CURRENTLY HAVE AN APPLICATION ON FILE THIS CYCLE</b></div></center>';
                                        echo '<br><a class="btn btn-info btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
                                    }
                                    // IF THERE IS MORE THAN ONE APP WITH NO APPS THIS CYCLE
                                    elseif($appCount >= '1') {
                                        echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                                        echo '<br><a class="btn btn-info btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
                                    } else {
                                        echo '<center><div class="alert alert-danger" role="alert">AN ERROR HAS OCCURED</div></center>';
                                    }
                                
                                ?>
                                
                            </div>
                        </div>
                        <!-- <br>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Recruitment Application</h3>
                                <br>
                                <button class="btn btn-outline-primary btn-block">OPEN NEW APPLICATION</button>
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

<!-- appsModal -->
<div class="modal fade" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="appsModalLabel">Your Applications</h5>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

            <div class="modal-body">
                <p>Below are your current applications in our system.</p>
                
                
                        <?php
                            if($appCount >= '1') {
                                echo '<center><div class="alert alert-info" role="alert">YOU HAVE <b>' . $appCount . '</b> APPLICATIONS ON FILE</div></center>';
                                while ($appRow = mysqli_fetch_array($getAllResult)) {
                                    echo '<div class="card">';
                                    echo '<div class="card-header">';
                                    echo 'Application Submitted: <b>' . $appRow['appDateTime'] . '</b>' . '<br>Application Status: <b>' . $appRow['appStatus'] . '</b>';
                                    echo '</div><div class="card-body">';
                                    echo '<a class="btn btn-secondary btn-block" href="view.php?id=' . $appRow['id'] . '">VIEW APPLICATION</a>';
                                    echo '</div></div><br>';
                                }
                            } else {
                                echo '<center><div class="alert alert-info" role="alert">NO APPS TO RETURN</div></center>';
                            }
                            
                        ?>
                    </div>
                        
                </div>
                

            </div>

        </div>
    </div>
</div>