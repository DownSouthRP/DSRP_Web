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

// TERMS MODAL
include_once $_SERVER['DOCUMENT_ROOT']."/sys/modals/tac.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/modals/pp.php";


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
							<h4><center>DSRP Registration</center></h4>
						</div>
						
						<div class="card-body">
                            <center>
                                <p>
                                    Welcome to DownSouthRP. Here we strive to give the best roleplay experience around. We are focused on building friendship and having fun as a what we hope to become an online family.
                                    <br>To start the registration process please enter your desired display name.
                                </p>
                            </center>


							<div class="row">
								
                                <div class="col-md-12">
									<form role="form" action="/sys/scripts/regdn.php" method="post">
										<center>
                                            <br><br>

                                            <h4>Registration Agreement</h4>

                                            <br>

                                            <p>By clicking 'Continue' you agree to the site terms and conditions as well as the site privacy policy.</p>
                                            
                                            <br>

                                            <div>
                                                <a class="btn btn-info" href="#termsModal" data-toggle="modal">Terms and Conditions</a>
                                                <a class="btn btn-info" href="#privacyModal" data-toggle="modal">Privacy Policy</a>
                                            </div>

                                            <br>
                                            
                                            <button type="submit" class="btn btn-primary">Continue</button>
                                        </center>
									</form>

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

