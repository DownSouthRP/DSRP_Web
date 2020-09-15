<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECKS TO SEE IF GET IS THERE
if(!isset($_GET) || empty($_GET) || is_null($_GET)) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.----');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
// CHECKS TO SEE IF GET VALUES ARE THERE
if(!isset($_GET['e']) || empty($_GET['e']) || is_null($_GET['e'])) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.---');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
if(!isset($_GET['h']) || empty($_GET['h']) || is_null($_GET['h'])) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.--');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
if(!isset($_GET['r']) || empty($_GET['r']) || is_null($_GET['r'])) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.-');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// VALIDATES EVERYTHING
$h = ''; // hash
$e = ''; // email
$r = ''; // return/

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $h = validate($_GET["h"]);
    $e = validate($_GET["e"]);
    $r = validate($_GET["r"]);
    $message = '';
  }
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// PULLS IN THE PAGE REQUIREMENTS FOR HTML
include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";

?>

<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
			
				<div class="col-md-3">
				</div>

				<div class="col-md-6">
					
					<center><img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br></center>
					
					<br>

					<div class="card" style="width: 100%;">

						<div class="card-header">
							<h4><center>Reset Password</center></h4>
						</div>
						
						<div class="card-body">
                            <div class="row">
                
                                <div class="col-md-4">
                                </div>

                                <div class="col-md-4">
                                    <center>
                                        <form action="#" method="post">
                                            <div class="form-group">
                                                <label for="newPassword">New Password</label>
                                                <input class="form-control" type="password" id="newPassword" name="newPassword" required />
                                            </div>

                                            <br>

                                            <div class="form-group">
                                                <label for="confirmNewPassword">Confirm New Password</label>
                                                <input class="form-control" type="password" id="confirmNewPassword" name="confirmNewPassword" required />
                                            </div>

                                            <br>

                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </center>
                                </div>

                                <div class="col-md-4">
                                </div>

                            </div>
							
						</div>
					</div>

				</div>

				<div class="col-md-3">
				</div>
				
			</div>
		</div>
	</div>
</div>

<?php

// = 'These fields do not match. Please try to use two passwords that match.'

// VALIDATES EVERYTHING
$newPassword = '';
$confirmNewPassword = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = validateNew($_POST["newPassword"]);
    $confirmNewPassword = validateNew($_POSt["confirmNewPassword"]);
}
function validateNew($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // IF NEW PASSWORDS DONT MATCH
    if($confirmNewPassword !== $newPassword) {
        echo "<script>alert('Youre two new passwords do not match. Please head back to your email and try again.');</script>";
        echo '<script type="text/javascript">location.href = "/home/";</script>';
        exit;
    }

    // CREATES THE NEW PASSWORD HASH
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // GET STATEMENT READY AND EXECUTES
    if($stmt = $con-prepare(' UPDATE accounts SET password = ? WHERE email = ? ')) {
        $stmt->bind_param("ss", $newHashedPassword, $e);
        
        if($stmt->execute()) {

            $stmt = $con->prepare(' DELETE FROM accounts WHERE hash = ? ');
            $stmt->bind_param('s', $h);
            $stmt->execute();

        } else {
            echo "<script>alert('Your password has been reset! You will now be redirected.---');</script>";
            echo '<script type="text/javascript">location.href = "/home/";</script>';
            exit;
        }

        
    } else {
        echo "<script>alert('Your password has been reset! You will now be redirected.--');</script>";
        echo '<script type="text/javascript">location.href = "/home/";</script>';
        exit;
    }

}








?>