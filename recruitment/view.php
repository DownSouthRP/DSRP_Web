<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
// CHECK IF USER IS LOGGED IN AND HAS RECRUITMENT PERMISSIONS
if(!isset($_SESSION['loggedin']) && is_null($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
// CHECK IF USER HAS RECRUITMENT PERMISSIONS (Department Director, Department Manager, Department Supervisor, Department Liasion, Department Senior Officer, Department Officer, Department Assistant Officer)
if(!isset($recruitmentRank) && is_null($recruitmentRank) && empty($recruitmentRank)) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
} else {
    if(!in_array($recruitmentRank, $recruitmentRanks)) {
        echo '<script type="text/javascript">location.href = "/home/";</script>';
        exit;
    }
}


// CHECK $_GET
if(!isset($_GET) || empty($_GET) || is_null($_GET)) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
} 

// CHECK $_GET['id'] IS A THING
if(!isset($_GET['id']) || empty($_GET['id']) || is_null($_GET['id'])) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
} 

// VALIDATE $_GET['id'] AND SET APPINFO
$id = '';
$id = validate($_GET["id"]);
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// SET APP VARIABLES
if($stmt = $con->prepare(" SELECT name, dob, age, email, appDept, appQ1, appQ3, appQ2, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear, appDeniedReasons FROM apps WHERE id = ? ")) {
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_result($name, $dob, $age, $email, $appDept, $appQ1, $appQ3, $appQ2, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $appDateTime, $appMonth, $appYear, $appDeniedReasons);
        $stmt->fetch();

    } else {
        echo "<script>alert('An error has occured attempting to fetch values.');</script>";
        echo '<script type="text/javascript">location.href = "/home/";</script>';
        exit;
    }

} else {
    echo "<script>alert('An error with a connection deep deep down has occured preventing you from proceeding further.');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

$appID = $id;
$appName = $name;
$appDOB = $dob;
$appAge = $age;
$appEmail = $email;

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/modules/recruitmentHeader.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/modals/recruitmentModals.php";
?>

<!-- SIDEBAR & OTHER CONTENTS -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		
        <div class="col-md-8">

            <div class="card text-center">
                <div class="card-header">
                    Set Application Status
                </div>
                <div class="card-body">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#acceptedModal">Accepted</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pendingModal">Pending</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deniedModal">Denied</button>
                        
                </div>
            </div>

            <br>
        
            <div class="card text-center">
                <div class="card-header">
                    Application #<?php echo $appID; ?>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Applicant Information
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Name:</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $appName; ?>" readonly/>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Email:</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $appEmail; ?>" readonly/>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Date of Birth:</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $appDOB; ?>" readonly/>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Age:</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $appAge; ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    Previous Application History
                                </div>
                                <div class="card-body">
                                <!-- PREVIOUS APPLICATIONS (status & submission date) -->

<?php
    if($stmt = $con->prepare(" SELECT id, appStatus, appDateTime, appDeniedReasons FROM apps WHERE appUser = ? AND id != ?")) {
        $stmt->bind_param("ss", $appUser, $id);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $appStatus, $appDateTime, $appDeniedReasons);
            
            echo '<table class="table table-sm table-striped"><thead><tr class="bg-dark"><th><center>AppID</center></th><th><center>Status</center></th><th><center>Submission Date</center></th></tr></thead>';
            echo '<tbody>';   
            while($stmt->fetch()) {
                echo '<tr>';
                echo '<td>';
                echo $id;
                echo '</td>';
                echo '<td>';
                echo $appStatus;
                echo '</td>';
                echo '<td>';
                echo $appDateTime;
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';


        } else {
            echo "There are no previous apps from this user.";
        }

    } else {
        echo "<script>alert('An error with a connection deep deep down has occured preventing you from proceeding further.');</script>";
        echo '<script type="text/javascript">location.href = "/home/";</script>';
        exit;
    }

?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Application Responces
                                </div>
                                <div class="card-body text-left">

                                    <h6>Department</h5>
                                    <div class="card">
                                        <div class="card-body bg-secondary">
                                            <?php echo $appDept; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>What interests you about DownSouthRP?</h6>
                                    <div class="card">
                                        <div class="card-body bg-secondary">
                                            <?php echo $appQ1; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Have you had any roleplay experience? If so, what?</h6>
                                    <div class="card">
                                        <div class="card-body bg-secondary">
                                            <?php echo $appQ2; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Have you ever been a part of any FiveM communities before? If so, which ones?</h6>
                                    <div class="card">
                                        <div class="card-body bg-secondary">
                                            <?php echo $appQ3; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>In your own words, what is the definition of “true” roleplay?</h6>
                                    <div class="card">
                                        <div class="card-body bg-secondary">
                                            <?php echo $appQ4; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.</h6>
                                    <div class="card">
                                        <div class="card-body bg-secondary">
                                            <?php echo $appQ5; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>If you are accepted, do you agree to follow all training guidelines and core policies set by DSRP?</h6>
                                    <div class="card">
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
                    
                </div>
                <div class="card-footer text-muted">
                    <b>Submitted:</b> <?php echo  $appDateTime; ?>
                </div>
            </div>


        </div>

		<div class="col-md-2"></div>
	</div>
</div>
<br><br><br>
