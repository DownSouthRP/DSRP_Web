<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/config.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getDSRPInfo.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-primary navbar-dark bg-primary fixed-top">
				<a class="navbar-brand" href="/home/">
					<img src="/sys/design/imgs/dsrpRT.png" width="35" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    DSRP Recruitment Department Portal
				</a>
			</nav>
		</div>
	</div>
</div>
<br><br><br>
