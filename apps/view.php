<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");

// CHECK TO SEE IF USER IS LOGGED IN - IF NOT REDIRECT
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/apps/nli.php";</script>';
    exit;
}
// CHECK IF THERE IS AN APP ID IN URL - IF NOT REDIRECT -IF THERE IS ONE SET $appid
if(!isset($_GET) || is_null($_GET['id']) || empty($_GET['id'])) {
    echo '<script type="text/javascript">location.href = "/apps/";</script>';
    exit;
}

// VALIDATE INPUTS
$i = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $i = validate($_GET['id']);
    $u = $_SESSION['id'];
  }
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($i !== $_SESSION['id']) {
    echo '<script type="text/javascript">location.href = "/apps/";</script>';
    exit;
}

if($stmt = $con->prepare(' SELECT id, name, dob, age, email, appDept, appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear, appDeniedReasons FROM apps WHERE id = ?')) {
    $stmt->bind_param("s", $i);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $dob, $age, $email, $appDept, $appQ1, $appQ2, $appQ3, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $appDateTime, $appMonth, $appYear, $appDeniedReasons);
        $stmt->fetch();

    } else {
        echo 'err 2';
        exit;
    }
    
} else {
    echo 'err 1';
    exit;
}

if($u == $appUser) {

}  else {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECK TO SEE IF $appUser IS CURRENT USER - IF NOT REDIRECT
// if($u !== $appUser) {
//     echo 'nope - ';
//     echo $u . $appUser;
//     exit;
//     echo '<script type="text/javascript">location.href = "/apps/";</script>';
// }

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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">DownSouthRP Community Application</h3>
                                <br>
                                <h2>Application Information</h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border-secondary">
                                            <div class="card-header">Application Status</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $appStatus; 
                                                if(isset($appStatus) && $appStatus == 'Application Accepted') {
                                                    echo '<br>Congrats! You are now able to get on and complete an interview. The Recruitment TeamSpeak IP is: recruitment.dsrp.online.';
                                                }
                                                
                                                ?>
                                            </div>
                                        </div>
                                        <?php 
                                            if($appDeniedReasons == 'Application Denied') {
                                                echo '<br>';
                                                echo '<div class="card">';
                                                echo '<div class="card-header">Application Denial Reasons</div>';
                                                echo '<div class="card-body bg-secondary">';
                                                echo $appDeniedReasons;
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-secondary">
                                            <div class="card-header">Application Submittion Date</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $appDateTime; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h2>Application Responces</h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card border-secondary">
                                            <div class="card-header">Name</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $name; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-secondary">
                                            <div class="card-header">Date of Birth</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $dob; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-secondary">
                                            <div class="card-header">Age</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $age; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border-secondary">
                                            <div class="card-header">Email</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $email; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-secondary">
                                            <div class="card-header">Department</div>
                                            <div class="card-body bg-secondary">
                                                <?php echo $appDept; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="card border-secondary">
                                    <div class="card-header">What interests you about DownSouthRP?</div>
                                    <div class="card-body bg-secondary">
                                        <?php echo $appQ1; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card border-secondary">
                                    <div class="card-header">Have you had any roleplay experience? If so, what?</div>
                                    <div class="card-body bg-secondary">
                                        <?php echo $appQ2; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card border-secondary">
                                    <div class="card-header">Have you ever been a part of any FiveM communities before? If so, which ones?</div>
                                    <div class="card-body bg-secondary">
                                        <?php echo $appQ3; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card border-secondary">
                                    <div class="card-header">In your own words, what is the definition of “true” roleplay?</div>
                                    <div class="card-body bg-secondary">
                                        <?php echo $appQ4; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card border-secondary">
                                    <div class="card-header">Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.</div>
                                    <div class="card-body bg-secondary">
                                        <?php echo $appQ5; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="card border-secondary">
                                    <div class="card-header">If you are accepted, do you agree to follow all training guidelines and core policies set by DSRP?</div>
                                    <div class="card-body bg-secondary">
                                        <?php 
                                            if($appAgree == 'on') {
                                                echo 'Agreed.';
                                            } else {
                                                echo 'Did not agree.';
                                            } 
                                        ?>
                                    </div>
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
<br><br><br><br>