<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

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

					<div class="card" style="width:50%;">

					<div class="card-header">
							<h4><center>Register</center></h4>
						</div>
						
						<div class="card-body">
							<form role="form" action="/sys/scripts/registerScript.php" method="post">
								<div>
									<label for="regInputDisplayName">Display Name</label>
									<input type="text" class="form-control" id="regInputDisplayName" name="regInputDisplayName" required/>
								</div>
								<div>
									<label for="regInputEmail">Email Address</label>
									<input type="email" class="form-control" id="regInputEmail" name="regInputEmail" required/>
								</div>
								<div>
									<label for="regInputPassword">Password</label>
									<input type="password" class="form-control" id="regInputPassword" name="regInputPassword" required/>
								</div>
								<div>
									<label for="regInputConfirmPassword">Confirm Password</label>
									<input type="password" class="form-control" id="regInputConfirmPassword" name="regInputConfirmPassword" required/>
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
