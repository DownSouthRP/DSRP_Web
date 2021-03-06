<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// PULLS IN THE PAGE REQUIREMENTS FOR HTML
include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";

// ERROR CODE
$errCode = "<script>alert('You do not need to be here.');</script>" . '<script type="text/javascript">location.href = "/home/";</script>';

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECKS TO SEE IF GET IS THERE
if(!isset($_GET) || empty($_GET) || is_null($_GET)) {
    echo $errCode;
    exit;
}

// CHECKS TO SEE IF GET VALUES ARE THERE
if(!isset($_GET['e']) || empty($_GET['e']) || is_null($_GET['e'])) {
    echo $errCode;
    exit;
}

if(!isset($_GET['h']) || empty($_GET['h']) || is_null($_GET['h'])) {
    echo $errCode;
    exit;
}

// PAUSES FOR 
sleep(5);

// VALIDATES EVERYTHING
$h = '';
$e = '';

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $h = validate($_GET["h"]);
    $e = validate($_GET["e"]);
  }
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
							<h4><center>Checking Confirmation</center></h4>
						</div>
						
						<div class="card-body">
							<center>

                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>

                            <br><br><br>

                            <p>Stand by as we confirm your email and prepare a few thigns.</p>

                            <br>

                            <h4 class="text-primary"><b>DO NOT LEAVE THIS PAGE</b></h4>

                            </center>
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
sleep(3);

// IMPORTS DATABASE CONNECTION - $con 
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// GETS TEMP ACCOUNT INFORMAITON
if($stmt = $con->prepare(" SELECT email, password, displayName FROM tempaccounts WHERE hash = ? ")) {
    $stmt->bind_param("s", $h);
    $stmt->execute();
    $stmt->store_result();
    
    // IF THERE WAS AN ACCOUNT
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email, $password, $displayName);
        $stmt->fetch();

        // CREATE ACCOUNT FROM TEMP ACCOUNT INFORMAITON
        if($newAcc = $con->prepare(' INSERT INTO accounts (displayName, email, password, communityRank, permissionRank, profileBanner) VALUES (?,?,?, "Applicant", "Applicant", "/sys/design/imgs/dsrpBanner.png") ')) {
            $newAcc->bind_param("sss", $displayName, $email, $password);
            $newAcc->execute();
            $newAcc->store_result();

            // DELETE TEMP ACCOUNT FROM tempaccounts
            if($deleteTemp = $con->prepare(" DELETE FROM tempaccounts WHERE hash = ? AND email = ? ")) {
                $deleteTemp->bind_param("ss", $h, $e);
                $deleteTemp->execute();
                $deleteTemp->store_result();

                if($stmt = $con->prepare(' SELECT MAX(id) FROM accounts ')) {
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($id);
                    $stmt->fetch();
                    
                    if($stmt = $con->prepare(' INSERT INTO accountactivity (account, activityDetails, activityDateTime) VALUES (?,?,?) ')) {
                        $stmt->bind_param("sss", $id);
                        if($stmt->execute()) {
                            
                            // SEND FINAL REGISTRATION EMAIL
                            $mailTo = $e;
                            $mailSubject = "Registration Complete";
                            $mailTxt = "Thank you for registering for dsrp.online. Head over to https://www.dsrp.online/home/auth/login.php to signin with the email and password you used to register.";
                            $mailHeaders = "From: <REGISTRATION@DSRP.ONLINE>";

                            if(mail($mailTo,$mailSubject,$mailTxt,$mailHeaders)) {
                                echo '<script type="text/javascript">location.href = "/home/auth/login.php";</script>';
                                exit;

                            } else {
                                echo $errCode . '8';
                                exit;
                            }

                        } else {
                            echo $errCode . '7';
                            exit;
                        }

                    } else {
                        echo $errCode . '6';
                        exit;
                    }

                } else {
                    echo $errCode . '5';
                    exit;
                }

            } else {
                echo $errCode . '4';
                exit;
            }

        } else {
            echo $errCode . '3';
            exit;
        }

    } else {
        echo $errCode . '2';
        exit;
    }

} else {
    echo $errCode . '1';
    exit;
}

?>



