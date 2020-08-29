<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getApps.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
                                    // IF USER DOESNT HAVE AN APPLICATION
                                    if($getAllCountArray[0] < '1') {
                                        echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                                    } 
                                    // IF USER HAS MORE THAN 0 APPLICATIONS AND HAS NONE THAT ARE DENIED - OPEN NEW APPLICATION & VIEW PREVIOUS APPLICATIONS
                                    elseif($getAllCountArray[0] >= '1') {
                                        echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                                        echo '<br>';
                                        echo '<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
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
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>

            <div class="modal-body">
                <p>Below are your current applications in our system.</p>
                <?php
                    if($getAppCountRows[0] > '1') {
                        while($allAppRow = mysqli_fetch_array($allAppResult)) {
                            echo 'Application Submitted: ' . $allAppRow['appDateTime'] . '<br>Application Status: ' . $allAppRow['appStatus'];
                            echo '<a class="btn btn-';
                            if($allAppRow['appStatus'] == 'Application Submitted - Pending Review') {
                                echo 'warning';
                            }
                            elseif($allAppRow['appStatus'] == 'Application Denied') {
                                echo 'danger';
                            }
                            echo ' btn-block" href="view.php?id=' . $allAppRow['id'] . '">VIEW APPLICATION</a>';
                            echo '<br>';
                        }
                    } else {
                        echo 'NO APPS TO RETURN';
                    }
                    
                ?>

            </div>

        </div>
    </div>
</div>