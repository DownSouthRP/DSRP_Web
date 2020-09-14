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
                            <center><img style="width:20%;height:auto;" src="/sys/design/imgs/depts/bcso.png"><br></center>
                        </div>
                    </div><br>
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="/home/index.php">Home</a>
							</li>
							<li class="breadcrumb-item active">
								Blaine County Sheriff's Office
							</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Blaine County Sheriff's Office</h3>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Department Information</h5>
                                    <p>
                                        Our mission as Blaine County Sheriff’s Office Deputies is to ensure that the citizens of Blaine County are provided with a consistent sense of protection and security on a day to day basis. As a department, we showcase this promise of new-level law enforcement through advanced crime prevention and criminal extermination across the state. We will maintain this standard with the continuous growth in terms of tactic-improvements and resource-development.
                                        <br><br>
                                        <b>Message From the Sheriff:</b>
                                            <br>“Throughout your time in DSRP and BCSO, there stands a chance to be a time of adversity.  Everywhere you go, adversity awaits at some point. I encourage members of the Blaine County Sheriff’s Office to persevere during their tenure here and remain positive. We here at the Blaine County Sheriff’s Office are all a puzzle.  To complete that puzzle, you need every piece, and its members are those pieces we need to be complete. I look forward to working alongside everyone to make this department prosper and plentiful, and create an enthusiastic and welcoming atmosphere for everyone to enjoy their time here.”
                                        <br>-Blake L. 3C-1
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
                                        Sheriff
                                        <br>Undersheriff
                                        <br>Sheriff Colonel
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
                                        Senior Deputy II
                                        <br>Senior Deputy I
                                        <br>Deputy II
                                        <br>Deputy I
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Probationary</h6>
                                    <p class="card-text">
                                        Probationary Deputy
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