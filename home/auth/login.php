<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
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
										<a class="btn btn-secondary btn-block" href="/home/auth/request.php">Request Password Reset</a>
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
							<a class="btn btn-primary btn-large btn-block" href="/home/auth/register.php">Register Here</a>
						</div>
					</div>

				</div>

				<div class="col-md-3">
				</div>
				
			</div>
		</div>
	</div>
</div>

