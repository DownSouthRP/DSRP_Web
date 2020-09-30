<?php


include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

$currentMonth = date('m');
// GET ALL APPS FROM USER THIS CYCLE

if($stmt = $con->prepare(' SELECT * FROM apps WHERE appUser = ? AND appMonth = ? ')) {
    $stmt->bind_param('ss', $userID, $currentMonth);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {

        if($stmt = $con->prepare(' SELECT MAX(id) FROM apps WHERE appUser = ? AND appMonth = ? ')) {
            $stmt->bind_param('ss', $userID, $currentMonth);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0) {
                $stmt->bind_result($appID, $name, $dob, $age, $email, $appDept, $appQ1, $appQ2, $appQ3, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $appDateTime, $appMonth, $appYear, $appDeniedReasons);
                $stmt->fetch();
        
                if($appStatus == 'Application Submitted - Pending Review') {
                    echo ' <div class="card text-center border-warning">
                    <div class="card-header bg-warning"></div>
                    <div class="card-body">
                        <h5 class="card-title">PENDING APPLICATION</h5>
                        <p>There is currently a pending application with your name on it.</p>
                        <a href="/apps/view.php?id=' . $appID . '"class="btn btn-warning">View Application</a>
                        </div>
                    </div>';
                
                } 
                elseif($appStatus == 'Application Accepted') {
                    echo ' <div class="card text-center border-success">
                    <div class="card-header bg-success"></div>
                    <div class="card-body">
                        <h5 class="card-title">APPLICATION ACCEPTED</h5>
                        <p>Your app has been reviewed and accepted!</p>
                        <a href="/apps/view.php?id=' . $appID . '"class="btn btn-warning">View Application</a>
                        </div>
                    </div>';
                } 
                elseif($appStatus == 'Application Denied') {
                    echo ' <div class="card text-center border-danger">
                    <div class="card-header bg-danger"></div>
                    <div class="card-body">
                        <h5 class="card-title">APPLICATION DENIEd</h5>
                        <p>Your app has been denied!</p>
                        <a href="/apps/view.php?id=' . $appID . '"class="btn btn-warning">View Application</a>
                        </div>
                    </div>';
                } else {
                    echo 'err 3';
                    exit;
                }
        
            } else {
                echo 'THERE ARE NO APPS FROM YOU.';
                exit;
            }
            }
        }

        
}


$appCurrentCycleSQL = " SELECT COUNT(*) FROM apps WHERE appUser = '".$userID."' AND appMonth = '".$currentMonth."' ";
$appCurrentCycleResult = mysqli_query($con, $appCurrentCycleSQL);
$appCurrentCycleArray = mysqli_fetch_array($appCurrentCycleResult);
$currentCycleCount = $appCurrentCycleArray[0];

// IF THERE ARE NO APPS OPEN
if($currentCycleCount >= '1') {
    echo '<br>';
    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
    if($stmt = $con->prepare(' SELECT id, name, appUser FROM apps WHERE appUser = ?')) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        $stmt->store_result();
        
        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $appUser);
            $stmt->fetch();
    
            if($appUser == $_SESSION['id']) {
                echo ' <div class="card text-center border-warning">
                <div class="card-header bg-warning"></div>
                <div class="card-body">
                    <h5 class="card-title">PENDING APPLICATION</h5>
                    <p>There is currently a pending application with your name on it.</p>
                    <a href="/apps/view.php?id=' . $userID . '"class="btn btn-warning">View Application</a>
                    </div>
                </div>';
            
            } else {
                echo 'err 3';
                exit;
            }

        } else {
            echo 'err 2';
            exit;
        }
        
    } else {
        echo 'err 1';
        exit;
    }
    
    echo '<br>';
}



?>