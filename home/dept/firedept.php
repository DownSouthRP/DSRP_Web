<!-- Created by: DownSouthRP Development Department -->
<!-- Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone. -->

<?php

// STARTS SESSION IF NOT ALREADY STARTED
if(session_status() !== PHP_SESSION_ACTIVE) {
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
                    <div class="card">
                        <div class="card-body">
                            <center><img style="width:20%;height:auto;" src="/sys/design/imgs/depts/fire.png"><br></center>
                        </div>
                    </div><br>
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="/home/index.php">Home</a>
							</li>
							<li class="breadcrumb-item active">
								San Andreas Fire & EMS
							</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Welcome to the San Andreas Fire & EMS</h3>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Department Information</h5>
                                    <center>
                                    <img style="width:50%;" src="/sys/design/imgs/depts/fire.png">
                                    <br><br>
                                    <p>There will more information announced and placed here when it becomes available.</p>
                                    </center>
                                </div>
                            </div>
						</div>
						<div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Department Rank Structure</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Administration</h6>
                                    <p class="card-text">
                                        Fire Chief
                                        <br>Deputy Fire Chief
                                        <br>Assistant Fire Chief
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Senior Staff</h6>
                                    <p class="card-text">
                                        Fire Captain
                                        <br>Fire Lieutenant
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Staff</h6>
                                    <p class="card-text">
                                        Station Commander
                                        <br>Station Supervisor
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Junior Staff</h6>
                                    <p class="card-text">
                                        Station Engineer
                                        <br>Station Advisor
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Members</h6>
                                    <p class="card-text">
                                        Senior Firefighter II
                                        <br>Senior Firefighter I
                                        <br>Firefighter II
                                        <br>Firefighter I
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Probationary</h6>
                                    <p class="card-text">
                                        Probationary Firefighter
                                    </p>
                                </div>
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