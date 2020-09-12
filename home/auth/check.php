<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// PULLS IN THE PAGE REQUIREMENTS FOR HTML
include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";

$email = 'andersonbrown833@gmail.com';
$hash = 'hashhere';

$mailTo = $email;
$mailSubject = "Confirmation Code";
$mailLink = 'https://www.dsrp.online/home/auth/confirm.php?e="' . $email . '&h=' . $hash;
$mailTxt = "Hello, thank you for registering for dsrp.online. <a href='$mailLink'>CLICK HERE</a> to finish your registration.";
$mailHeaders = "From: registration@dsrp.online";

if(mail($mailTo,$mailSubject,$mailTxt,$mailHeaders)) {
	echo '<script type="text/javascript">location.href = "/home/auth/check.php";</script>';
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
							<h4><center>Waiting For Confirmation</center></h4>
						</div>
						
						<div class="card-body">
							<center>

                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>

                            <br><br><br>

                            <p>Please check your email for a confirmation link to continue with the registration process.</p>

                            <br>

                            <h4 class="text-info"><b>YOU CAN LEAVE THIS PAGE</b></h4>

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

