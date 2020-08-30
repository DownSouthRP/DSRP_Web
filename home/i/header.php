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
					<img src="/sys/design/imgs/dsrpLogo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    DownSouthRP
                </a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav ml-md-auto">
						<a class="nav-link" href="/home/">Home</a>
						<?php
							if($getDSRPInfoRow['appStatus'] == "TRUE") {
								echo '<a class="nav-link" href="/apps/">Open Applications</a>';
							}
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Departments</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="/home/dept/lspd.php">Los Santos Police Department</a>
                                <a class="dropdown-item" href="/home/dept/bcso.php">Blaine County Sheriff's Office</a>
                                <a class="dropdown-item" href="/home/dept/sasp.php">San Andreas State Police</a>
                                <a class="dropdown-item" href="/home/dept/firedept.php">San Andreas Fire & EMS</a>
                                <a class="dropdown-item" href="/home/dept/comms.php">Communications</a>
                                <a class="dropdown-item" href="/home/dept/civops.php">Civilian Operations</a>
							</div>
                        </li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Resources</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="https://docs.google.com/document/d/1bJD8NXZcOrDvoekknZ48Bx8A14zjy8wENxTlgvVWtCI/edit" target="_blank">DSRP Rules & Regulations</a>
								<a class="dropdown-item" href="https://discord.gg/Qg8Hkwb" target="_blank">Public Relations Discord</a>
								<a class="dropdown-item" href="https://twitter.com/dsrp_official" target="_blank">DSRP Twitter</a>
								
							</div>
                        </li>
						<li class="nav-item"></li>
						<?php 
							// IF USER IS NOT LOGGED IN
							if(!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] !== TRUE){
								echo '<a href="/home/auth/login.php" class="nav-link">Login</a>';
							} else {
								echo '<li class="nav-item dropdown">';
								echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">';
								if(isset($getCurrentUserRow['displayName'])) { echo $getCurrentUserRow['displayName']; }
								echo '</a>';
								echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">';
								echo '<a class="dropdown-item" href="';
								echo '/profile/view.php?id=';
								echo $getCurrentUserRow['id'];
								echo '">View Profile</a>';
								echo '<a class="dropdown-item" href="/profile/settings.php">Settings</a>';

								// IF STAFF OR ADMIN OR RECRUITMENT STAFF
								if(in_array($getCurrentUserRow['recruitmentRank'],$recruitmentRanks) || in_array($getCurrentUserRow['permissionRank'],$staff)) {
									echo '<div class="dropdown-divider"></div>';
								}
								// IF IS STAFF
								if(in_array($getCurrentUserRow['permissionRank'],$staff)) {
									echo '<a class="dropdown-item" href="/staff/">Staff Panel</a>';
								}
								// IF IS ADMIN
								if(in_array($getCurrentUserRow['permissionRank'],$admin)) {
									echo '<a class="dropdown-item" href="/admin/">Admin Panel</a>';
								}
								// IF MEMBER OF RT DEPARTMENT
								if(in_array($getCurrentUserRow['recruitmentRank'],$recruitmentRanks)) {
									echo '<a class="dropdown-item" href="/rt/">Recruitment Portal</a>';
								}
								echo '<div class="dropdown-divider"></div>';
								echo '<a class="dropdown-item" href="/sys/logout.php">Logout</a>';
								echo '</div>';
								echo '</li>';
							}
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<br><br><br>
