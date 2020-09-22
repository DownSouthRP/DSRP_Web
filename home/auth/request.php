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
			
				<div class="col-md-2"></div>

				<div class="col-md-8">
					
					<center><img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br></center>
					
					<br>

					<div class="card" style="width: 100%;">
						<div class="card-header">
							<h4><center>Request A Reset</center></h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<form role="form" action="/sys/scripts/er.php" method="post">
										<div class="form-group">
											<label for="resetEmail">Email Address</label>
											<input type="email" class="form-control" id="resetEmail" name="resetEmail" required/>
										</div>
										<button type="submit" class="btn btn-primary btn-block">Submit</button>
									</form>

								</div>
								<div class="col-md-4">
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="col-md-2"></div>
				
			</div>
		</div>
	</div>
</div>

