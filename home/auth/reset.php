<!-- [[

Created by: DownSouthRP Development Department

Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone.

]] -->

<?php

// STARTS SESSION IF NOT ALREADY STARTED
if(session_status() !== PHP_SESSION_ACTIVE) {
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
							<h4><center>Reset Password</center></h4>
						</div>
						
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<form role="form" action="/sys/scripts/loginScript.php" method="post">
										<div class="form-group">
											<label for="resetPassword">New Password</label>
											<input type="password" class="form-control" id="resetPassword" name="resetPassword" required/>
										</div>
										<div class="form-group">
											<label for="resetPasswordConfirm">Confirm New Password</label>
											<input type="password" class="form-control" id="resetPasswordConfirm" name="resetPasswordConfirm" required/>
										</div>
										<button type="submit" class="btn btn-primary btn-block">Reset</button>
									</form>

								</div>
								<div class="col-md-4">
								</div>
							</div>

						</div>
					</div>

					<br>

					<div class="card" style="width: 100%;">
						<div class="card-body">
							<a class="btn btn-primary btn-large btn-block" href="login.php">Cancel</a>
						</div>
					</div>

				</div>

				<div class="col-md-3">
				</div>
				
			</div>
		</div>
	</div>
</div>

