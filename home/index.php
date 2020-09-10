<!-- Created by: DownSouthRP Development Department -->
<!-- Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone. -->

<?php

// STARTS SESSION IF NOT ALREADY STARTED
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// IMPORTS FILES LATER USED IN CODE
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
                    <center><img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br></center>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <center>
                                            <img style="width:50%;height:auto;" src="/sys/design/imgs/dsrpLogo.png"><br><br>
                                            <p style="font-size:20px;">Down South Roleplay Community was founded in 2020 by Jay & Braden. Along with some friends, they want to enhance the roleplay without having many restrictions. Our main purpose here at Down South Roleplay is to make RP better for everyone.</p>
                                        </center>
                                    </div>
                                    <!-- <div class="card">
                                        <div class="card-body">
                                        ONLINE MEMBERS LIST
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <center><h4>Quick References</h4>
                                    <br>
                                    <button class="btn btn-primary" href="https://discord.gg/Qg8Hkwb" target="_blank">Public Relations Discord</button>
                                
                                    <br><br>

                                    <h6>Community Director <br>Jay L.</h6>
                                    <h6>Community Deputy Director <br>Braden B.</h6>
                                    <h6>Community Coordinator <br>Ryan D.</h6>
                                    <h6>Development Coordinator <br>Anderson B.</h6>
                                </center>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <center><h4>Application Status</h4>
                                    <br>
                                    <?php
                                        include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getDSRPInfo.php";
                                        if($getDSRPInfoRow['appStatus'] == "TRUE") {
                                            echo '<a class="btn btn-primary" href="/apps/">CURRENTLY OPEN</a>';
                                        } else {
                                            echo '<button class="btn btn-primary disabled">CURRENTLY CLOSED</button>';
                                        }
                                        
                                    ?>
                                    </center>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>

