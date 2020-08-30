<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");
// START SESSION IF NOT ALREADY STARTED
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// SETS $appid VARIABLE
$appid = "";
// CHECK TO SEE IF USER IS LOGGED IN - IF NOT REDIRECT
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/apps/nli.php";</script>';
}
// CHECK IF THERE IS AN APP ID IN URL - IF NOT REDIRECT -IF THERE IS ONE SET $appid
if(!isset($_GET)) {
    echo '<script type="text/javascript">location.href = "/apps/";</script>';
}
elseif(is_null($_GET['id'])) {
    echo '<script type="text/javascript">location.href = "/apps/";</script>';
} else {
    $appid = $_GET['id'];
}

// GET APPLICATIONS WITH THE ID OF $appid
$getAppSQL = " SELECT * FROM apps WHERE id = '".$appid."' ";
$getAppResult = mysqli_query($con, $getAppSQL);
$getAppRow = mysqli_fetch_assoc($getAppResult);

// CHECK TO SEE IF $appUser IS CURRENT USER - IF NOT REDIRECT
if($getAppRow['appUser'] !== $getCurrentUserRow['id']) {
    echo '<script type="text/javascript">location.href = "/apps/";</script>';
} else {
    // IF WE GET TO THIS POINT ALL IS GOOD AND THE CURRENT USER IS SUPPOSE TO BE VIEWING THIS APPLICATION HERE

    // SET APP VIEW VARIABLES FOR EASY ACCESS
    $viewName = $getAppRow['name'];
    $viewDOB = $getAppRow['dob'];
    $viewAge = $getAppRow['age'];
    $viewEmail = $getAppRow['email'];
    $viewDept = $getAppRow['appDept'];
    $viewQ1 = $getAppRow['appQ1'];
    $viewQ2 = $getAppRow['appQ2'];
    $viewQ3 = $getAppRow['appQ3'];
    $viewQ4 = $getAppRow['appQ4'];
    $viewQ5 = $getAppRow['appQ5'];
    if($getAppRow['appAgree'] = 'on') {
        $viewAgree = 'I agreed';
    } else {
        $viewAgree = 'I did not agree';
    }
    $viewStatus = $getAppRow['appStatus'];
    $viewDateTime = $getAppRow['appDateTime'];
    $viewDeniedReason = $getAppRow['appDeniedReasons'];
}

// GET APPLICATION ACTIVITY BASED ON APPLICATION ID
$getAppActivitySQL = " SELECT * FROM appActivity WHERE app = '".$appid."' ";
$getAppActivityResult = mysqli_query($con, $getAppActivitySQL);




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
                                <h2>Application Information</h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">Application Status</div>
                                            <div class="card-body">
                                                <?php echo $viewStatus; ?>
                                            </div>
                                        </div>
                                        <?php 
                                            if($viewDeniedReason == 'Application Denied') {
                                                echo '<br>';
                                                echo '<div class="card">';
                                                echo '<div class="card-header">Application Denial Reasons</div>';
                                                echo '<div class="card-body">';
                                                echo $viewDeniedReason;
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">Application Submittion Date</div>
                                            <div class="card-body">
                                                <?php echo $viewDateTime; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h2>Application Responces</h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">Name</div>
                                            <div class="card-body">
                                                <?php echo $viewName; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">Date of Birth</div>
                                            <div class="card-body">
                                                <?php echo $viewDOB; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">Age</div>
                                            <div class="card-body">
                                                <?php echo $viewAge; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">Email</div>
                                            <div class="card-body">
                                                <?php echo $viewEmail; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">Department</div>
                                            <div class="card-body">
                                                <?php echo $viewDept; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="card">
                                    <div class="card-header">What interests you about DownSouthRP?</div>
                                    <div class="card-body">
                                        <?php echo $viewQ1; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">Have you had any roleplay experience? If so, what?</div>
                                    <div class="card-body">
                                        <?php echo $viewQ2; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">Have you ever been a part of any FiveM communities before? If so, which ones?</div>
                                    <div class="card-body">
                                        <?php echo $viewQ3; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">In your own words, what is the definition of “true” roleplay?</div>
                                    <div class="card-body">
                                        <?php echo $viewQ4; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.</div>
                                    <div class="card-body">
                                        <?php echo $viewQ5; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">If you are accepted, do you agree to follow all training guidelines and core policies set by DSRP?</div>
                                    <div class="card-body">
                                        <?php echo $viewAgree; ?>
                                    </div>
                                </div>
                                <br>
                                <h2>Application Activity</h2>
                                
                                <ul class="list-group">
                                <?php 
                                    while($appActivityRow = mysqli_fetch_array($getAppActivityResult)) {
                                        echo '<li class="list-group-item">';
                                        echo $appActivityRow['detail'] . " - " . $appActivityRow['dateTime'];
                                        echo '</li><br>';
                                    }

                                ?>
                                </ul>
                                

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
<br><br><br><br>