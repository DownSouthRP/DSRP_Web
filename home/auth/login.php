<!-- Created by: DownSouthRP Development Department -->
<!-- Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone. -->

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
							<h4><center>Login</center></h4>
						</div>
						
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<form role="form" action="/sys/scripts/loginScript.php" method="post">
										<div class="form-group">
											<label for="authInputUsername">Email Address</label>
											<input type="email" class="form-control" id="authInputUsername" name="authInputUsername" required/>
										</div>
										<div class="form-group">
											<label for="authInputPassword">Password</label>
											<input type="password" class="form-control" id="authInputPassword" name="authInputPassword" required/>
										</div>
										<button type="submit" class="btn btn-primary btn-block">Login</button>
										<br>
										<p>If you have forgotten your password please seek out a member of the <b>DownSouthRP Administration Team</b>.</p>
									</form>

								</div>
								<div class="col-md-4">
								</div>
							</div>

						</div>
					</div>

					<br>

					<div class="card" style="width: 100%;">
						<div class="card-header">
							<center><h4 class="card-title">Don't have an account yet?</h4></center>
						</div>
						<div class="card-body">
							<a class="btn btn-primary btn-large btn-block" href="register.php">Register Here</a>
						</div>
					</div>

				</div>

				<div class="col-md-3">
				</div>
				
			</div>
		</div>
	</div>
</div>

