<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// PULLS IN THE PAGE REQUIREMENTS FOR HTML
include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
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

                            <p>Please check your email for a confirmation link to continue with the registration process.
							<br>
							This email might be considered SPAM by some accounts. Be sure to check there as well.</p>

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

