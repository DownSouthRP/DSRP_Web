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
include_once $_SERVER['DOCUMENT_ROOT']."/sys/modules/auth/header.php";

?>

<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2"></div>

				<div class="col-md-8">
					
					<center><img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br></center>
					
					<br>

					<div class="card" style="width: 100%;">
						<div class="card-body">
							<h1 class="card-title">Register</h1>
							<br>
							<form role="form" action="/sys/scripts/registerScript.php" method="post">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label for="regInputDisplayName">Display Name</label>
											<input type="text" class="form-control" id="regInputDisplayName" name="regInputDisplayName" required/>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="regInputEmail">Email Address</label>
											<input type="email" class="form-control" id="regInputEmail" name="regInputEmail" required/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label for="regInputPassword">Password</label>
											<input type="password" class="form-control" id="regInputPassword" name="regInputPassword" required/>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label for="regInputConfirmPassword">Confirm Password</label>
											<input type="password" class="form-control" id="regInputConfirmPassword" name="regInputConfirmPassword" required/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
										<label class="custom-control-label" for="customSwitch1">Remember Me</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">Register</button>
							</form>
						</div>
					</div>

				</div>

				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>
