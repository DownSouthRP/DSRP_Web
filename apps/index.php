<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getApps.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentMonth = date('m');
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
                                    // IF USER DOESNT HAVE AN APPLICATION
                                    elseif($getAllCountArray[0] < '1') {
                                        echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                                    }
                                    // IF USER HAS MORE THAN 0 APPS THIS CYCLE
                                    elseif($getAllCycleCountArray[0] >= '1') {
                                        echo '<a class="btn btn-secondary btn-block" disabled>OPEN NEW APPLICATION</a>';
                                        echo '<br><center><div class="alert alert-danger" role="alert">YOU CURRENTLY HAVE AN APPLICATION ON FILE THIS CYCLE</div></center>';
                                        echo '<br>';
                                        echo '<a class="btn btn-info btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
                                    }
                                    // IF USER HAS MORE THAN 0 APPLICATIONS
                                    elseif($getAllCountArray[0] >= '1') {
                                        echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                                        echo '<br>';
                                        echo '<a class="btn btn-info btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
                                    } else {
                                        echo 'an error has occured';
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
                            if($getAllCountArray[0] >= '1') {
                                while($appRow = mysqli_fetch_array($getAllResult)) {
                                    echo '<div class="card">';
                                    echo '<div class="card-header">';
                                    echo 'Application Submitted: <b>' . $appRow['appDateTime'] . '</b>' . '<br>Application Status: <b>' . $appRow['appStatus'] . '</b>';
                                    echo '</div><div class="card-body">';
                                    echo '<a class="btn btn-secondary btn-block" href="view.php?id=' . $appRow['id'] . '">VIEW APPLICATION</a>';
                                    echo '</div></div><br>';
                                }
                            } else {
                                echo 'NO APPS TO RETURN';
                            }
                            
                        ?>
                    </div>
                        
                </div>
                

            </div>

        </div>
    </div>
</div>