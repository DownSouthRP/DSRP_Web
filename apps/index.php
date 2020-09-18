<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
	echo '<script type="text/javascript">location.href = "nli.php";</script>';
}

$currentMonth = date('m');
// THIS GETS A COUNT OF ALL APPLICATIONS SUBMITTED BY ONE USER
$allAppsSQL = " SELECT COUNT(*) FROM apps WHERE appUser = '".$id."' ";
$allAppsResult = mysqli_query($con, $allAppsSQL);
$allAppsRows = mysqli_fetch_array($allAppsResult);

// GET ALL APPS FROM USER THIS CYCLE
$appCurrentCycleSQL = " SELECT COUNT(*) FROM apps WHERE appUser = '".$id."' AND appMonth = '".$currentMonth."' ";
$appCurrentCycleResult = mysqli_query($con, $appCurrentCycleSQL);
$appCurrentCycleArray = mysqli_fetch_array($appCurrentCycleResult);

// GET ALL APPS FROM USER
$getAllAppArray = " SELECT * FROM apps WHERE appUser = '".$id."' ";
$getAllResult = mysqli_query($con, $getAllAppArray);

$appCount = $allAppsRows[0];
$currentCycleCount = $appCurrentCycleArray[0];

// /////////////////////// //
$recruitmentApps = FALSE;

if($permissionRank == 'Applicant') {
    $recruitmentApps = TRUE;
} else {
    $recruitmentApps = FALSE;
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
                    <div class="card">
                        <div class="card-body">
                            <center><img style="width:15%;height:auto;" src="/sys/design/imgs/dsrpLogo.png"><br></center>
                        </div>
                        
                    </div>
                <br>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php
                    
                            if($recruitmentApps == TRUE) {
                                include_once $_SERVER['DOCUMENT_ROOT']."/sys/modules/appsRecruitment.php";
                            } else {
                                include_once $_SERVER['DOCUMENT_ROOT']."/sys/modules/noOpenRecruitment.php";
                            }

                        ?>    
                        
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