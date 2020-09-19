<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if($stmt = $con->prepare(' SELECT id, name, dob, age, email, appDept, appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear, appDeniedReasons FROM apps WHERE appUser = ?')) {
    $stmt->bind_param("s", $id);
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



?>


<div class="card text-center border-warning">
    <div class="card-header bg-warning"></div>
    <div class="card-body">
        <h5 class="card-title">PENDING APPLICATION</h5>
        <p>There is currently a pending application with your name on it.</p>
        <a href="/apps/view.php?id=<?php echo $id; ?>" class="btn btn-warning">View Application</a>
    </div>
</div>