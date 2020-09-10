<!-- [[

Created by: DownSouthRP Development Department

Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone.

]] -->

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
                            <center><img style="width:20%;height:auto;" src="/sys/design/imgs/depts/comms.png"><br></center>
                        </div>
                    </div><br>
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="/home/index.php">Home</a>
							</li>
							<li class="breadcrumb-item active">
								Communications Department
							</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Welcome to the Communications Department</h3>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Department Information</h5>
                                    <p>
                                        <b>About the Dispatch Department</b>
                                        <br> The Communication Department’s Mission is to provide top notch service to all members of the First Responder Community while maintaining a high level of professionalism. Furthermore, we help the community when they need urgent help by answering their 911 calls and providing help and service over the phone until First Responders arrive.
                                        <br>
                                        <br><b>Communications Code of Conduct</b>
                                        <br>The Communications Department has a Code of Conduct which all members have to follow:
                                        <br><b>§ 2.1.</b> Respect must be given to all Department of Justice Members, and Communications Members at all times. Any person who violates this section is eligible for disciplinary actions, up to instant dismissal from the Communications Department and/or Down South Roleplay.
                                        <br>
                                        <br><b>§ 2.2.</b> Respect must be given to all Staff, Senior Staff, Junior Administrators, Administrators, and Head Admins at all times.
                                        A person who violates this section is eligible for disciplinary actions, up to instant dismissal from the Communications Department and/or Down South Roleplay.
                                        <br>
                                        <br><b>§ 2.3.</b> Respect must be given to all Communications Command Staff (as defined in a previous section) at all times.
                                        A person who violates this section is eligible for disciplinary actions, up to instant dismissal from the Communications Department and/or Down South Roleplay.
                                        <br>
                                        <br><b>§ 2.4.</b> All Operators, Dispatchers, and Communications Department Members must follow the Chain of Command at all times.
                                        Any member who violates this section is eligible for disciplinary actions, up to the demotion of rank and recertification of Communications Department Standard Operating Procedure.
                                        This section can be waived with the verbal or written explicit instructions of a Communication Department Command Staff Member (as defined in a previous section).
                                        <br>
                                        <br><b>§ 2.5.</b> Reserve Operators may not overstep any Regular “Full-Time” Operator at any time.
                                        Any member who violates this section is eligible for disciplinary actions, up to the removal of the Reserve Dispatch Tag and termination of Membership within the Communications Division.
                                        This section can be waived with the verbal or written explicit instructions of a Communication Division Command Staff Member (as defined in a previous section).
                                    </p>
                                </div>
                            </div>
						</div>
						<div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Department Rank Structure</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Administration</h6>
                                    <p class="card-text">
                                        Dispatch Director
                                        <br>Dispatch Deputy Director
                                        <br>Dispatch Assistant Director
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Senior Staff</h6>
                                    <p class="card-text">
                                        Dispatch Manager
                                        <br>Dispatch Supervisor
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Staff</h6>
                                    <p class="card-text">
                                        Senior Operator IV
                                        <br>Senior Operator III
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Junior Staff</h6>
                                    <p class="card-text">
                                        Senior Operator II
                                        <br>Senior Operator I
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Members</h6>
                                    <p class="card-text">
                                        Operator IV
                                        <br>Operator III
                                        <br>Operator II
                                        <br>Operator I
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Probationary</h6>
                                    <p class="card-text">
                                        Dispatch Cadet
                                    </p>
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
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
	</div>
</div>