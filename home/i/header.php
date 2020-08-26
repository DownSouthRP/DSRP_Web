<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-primary navbar-dark bg-primary fixed-top">
				<a class="navbar-brand" href="\FTOPortal\portal\main.php">
					<img src="/sys/design/imgs/dsrpLogo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    DownSouthRP
                </a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav ml-md-auto">
						<a class="nav-link" href="/home/index.php">Home</a>
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
							if($_SESSION["loggedin"] == FALSE){
								echo '<a href="/home/auth/login.php" class="nav-link">Login</a>';
							} else {
								echo '<li class="nav-item dropdown">';
								echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">';
								echo $getCurrentUserRow['displayName'];
								echo '</a>';
								echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">';
								echo '<a class="dropdown-item" href="';
								echo '/profile/view.php?id=';
								echo $getCurrentUserRow['id'];
								echo '">My Profile</a>';
								// IF IS STAFF
								echo '<a class="dropdown-item" href="#">Staff Panel</a>';
								// IF IS ADMIN
								echo '<a class="dropdown-item" href="#">Admin Panel</a>';
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