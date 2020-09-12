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

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // CREATE ACCOUNT FROM TEMP ACCOUNT INFORMAITON
        if($newAcc = $con->prepare(' INSERT INTO accounts (displayName, email, password, communityRank, permissionRank) VALUES (?,?,?, "Applicant", "Applicant") ')) {
            $newAcc->bind_param("sss", $displayName, $email, $hashedPassword);
            $newAcc->execute();
            $newAcc->store_result();
            $newAcc->bind_result($id);

            // DELETE TEMP ACCOUNT FROM tempaccounts
            if($deleteTemp = $con->prepare(" DELETE FROM tempaccounts WHERE hash = ? ")) {
                $deleteTemp->bind_param("s", $h);
                $deleteTemp->exeucte();
               
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $id;

                echo '<script type="text/javascript">location.href = "/profile/";</script>';
                exit;
           
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
    


// IF ALL IS WELL ABOVE CREATE NEW ACCOUNT AND SEND WELCOME EMAIL



// CLOSE AND EXIT


?>



