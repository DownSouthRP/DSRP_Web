<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
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
                            <center><img style="width:20%;height:auto;" src="/sys/design/imgs/depts/sasp.png"><br></center>
                        </div>
                    </div><br>
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="/home/index.php">Home</a>
							</li>
							<li class="breadcrumb-item active">
								San Andreas State Police
							</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Welcome to the San Andreas State Police</h3>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Department Information</h5>
                                    <p>
                                    The San Andreas State Police is a highly trained group of individuals sworn in to protect and serve the citizens of San Andreas. Our job is to protect the lives and rights of all people within our state. State troopers have the authority to ticket, and even arrest citizens who violate state law. State troopers are responsible for enforcing vehicle safety on all highways and interstates located in San Andreas. State troopers must abide by all rules and regulations set forth by administration.
                                    <br><br>
                                    <b>Code of Conduct</b>
                                    <br>All members of the San Andreas State Police must be fully aware of the ethical responsibilities of their positions and must live up to the highest standards of law enforcement. All troopers must maintain an adult level maturity and must have respect for ALL members of this community and department. Failing to maintain that level of respect can result in disciplinary actions.

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
                                        Commissioner
                                        <br>Deputy Commissioner
                                        <br>Assistant Commissioner
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Senior Staff</h6>
                                    <p class="card-text">
                                        Captain
                                        <br>Lieutenant
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Staff</h6>
                                    <p class="card-text">
                                        Master Sergeant
                                        <br>Sergeant
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Junior Staff</h6>
                                    <p class="card-text">
                                        Senior Corporal
                                        <br>Corporal
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Members</h6>
                                    <p class="card-text">
                                        Senior Trooper II
                                        <br>Senior Trooper I
                                        <br>Trooper II
                                        <br>Trooper I
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Probationary</h6>
                                    <p class="card-text">
                                        Probationary Trooper
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