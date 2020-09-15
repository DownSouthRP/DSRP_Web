<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";


?>
<br><br><br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <center><img style="width:100%;height:auto;" src="/sys/design/imgs/dsrpBanner.png"><br></center>
                    <br>
                    <div class="card" style="width: 100%;">
                        <center>
                            <div class="card-header">
                                <h1 class="card-title">Not Logged In</h1>
                            </div>
                            <div class="card-body">
                                
                                    <p>Please login before attempting to open a new application.</p>
                                    <br>
                                    <a class="btn btn-primary" href="/home/auth/login.php">Login Here</a>
                                
                            </div>
                        </center>
                    </div> 
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>