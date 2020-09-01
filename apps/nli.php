<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");


?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <center><img style="width:15%;height:auto;" src="/sys/design/imgs/dsrpLogo.png"><br></center>
                        </div>                         
                    </div>
                    <br>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h1 class="card-title">Login</h1>
                            <br>
                            <form role="form" action="/home/auth/scripts/loginScript.php" method="post">
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
                    </div> 
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>