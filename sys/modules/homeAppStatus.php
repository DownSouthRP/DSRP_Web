<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

$currentMonth = date('m');
// GET ALL APPS FROM USER THIS CYCLE
$appCurrentCycleSQL = " SELECT COUNT(*) FROM apps WHERE appUser = '".$id."' AND appMonth = '".$currentMonth."' ";
$appCurrentCycleResult = mysqli_query($con, $appCurrentCycleSQL);
$appCurrentCycleArray = mysqli_fetch_array($appCurrentCycleResult);
$currentCycleCount = $appCurrentCycleArray[0];

// IF THERE ARE NO APPS OPEN
if($currentCycleCount >= '1') {
    echo '<br>';
    
    if($stmt = $con->prepare(' SELECT id, name, appUser FROM apps WHERE appUser = ?')) {
        $stmt->bind_param("s", $id);
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
                    <a href="/apps/view.php?id=' . $id . '"class="btn btn-warning">View Application</a>
                    </div>
                </div>';
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
} else {
    echo '<br><br>';
}



?>