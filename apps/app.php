<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/apps/nli.php";</script>';
}
if(!isset($getCurrentUserRow['permissionRank'])|| $getCurrentUserRow['permissionRank'] !== 'Applicant') {
    echo '<script type="text/javascript">location.href = "/apps/na.php";</script>';
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
                                <h3 class="card-title">DownSouthRP Community Application</h3>
                                <br>
                                <p>----</p>
                                <br>

                                <form action="/sys/scripts/appScript.php" method="post">
                                    <div class="form-row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="appName">First Name & Last Initial</label>
                                            <input type="text" class="form-control" id="appName" name="appName" aria-describedby="emailHelp" required>
                                        </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="appDoB">Date of Birth</label>
                                            <input type="date" class="form-control" id="appDoB" name="appDoB" aria-describedby="emailHelp" required>
                                        </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="appEmail">Email Address</label>
                                            <input type="email" class="form-control" id="appEmail" name="appEmail" aria-describedby="emailHelp" required>
                                        </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="appAge">Age</label>
                                            <input type="text" class="form-control" id="appAge" name="appAge" aria-describedby="emailHelp" required>
                                        </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="appDept">Department</label>
                                            <select class="form-control" id="appDept" name="appDept" required>
                                                <option></option>
                                                <option>Los Santos Police Departemnt</option>
                                                <option> San Andreas State Police</option>
                                                <option>Blaine County Sheriff’s Office</option>
                                                <option>Communications Department</option>
                                                <option>San Andreas Fire Department</option>
                                                <option>Civilian Operations</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="appQ1">What interests you about DownSouthRP?</label>
                                        <textarea class="form-control" id="appQ1" name="appQ1" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="appQ2">Have you had any roleplay experience? If so, what?</label>
                                        <textarea class="form-control" id="appQ2" name="appQ2" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="appQ3">Have you ever been a part of any FiveM communities before? If so, which ones?</label>
                                        <textarea class="form-control" id="appQ3" name="appQ3" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="appQ4">In your own words, what is the definition of “true” roleplay?</label>
                                        <textarea class="form-control" id="appQ4" name="appQ4" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="appQ5">Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.</label>
                                        <textarea class="form-control" id="appQ5" name="appQ5" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="appAgree" id="appAgree" checked="">
                                            <label class="custom-control-label" for="appAgree">If you are accepted, do you agree to follow all training guidelines and core policies set by DSRP?</label>
                                        </div>
                                    </div>

                                    <br><br>
                                    <button class="btn btn-primary btn-block" type="submit">SUBMIT</button>
                                
                                </form>

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
<br><br><br><br>