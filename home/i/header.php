<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getDSRPInfo.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/config.php");

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {

	if(isset($permissionRank) && $permissionRank !== "Applicant") {
		$needSteam = FALSE;
		$needDiscord = FALSE;
		$needTeamSpeak = FALSE;
		// CHECKS FOR steamID, discordID, and teamspeakID - IF NOT SET IN DATABASE IT WILL SHOW MODAL
		// CHECKS FOR steamID
		if(!isset($steamID) || is_null($steamID) || empty($steamID)) {
			$needSteam = TRUE;
		}
		elseif(!isset($discordID) || is_null($discordID) || empty($discordID)) {
			$needDiscord = TRUE;
		}
		elseif(!isset($teamspeakID) || is_null($teamspeakID) || empty($teamspeakID)) {
			$needTeamSpeak = TRUE;
		}
		if($needSteam == TRUE) {
			include($_SERVER['DOCUMENT_ROOT']."/sys/modals/needSteamID.php");
			// SHOW MODAL
			echo '<script> $(window).on(';
			echo "'load'";
			echo ',function(){ $("#steamIDModal").modal(';
			echo "'show'";
			echo '); }); </script>';
		}
		elseif($needDiscord == TRUE) {
			include($_SERVER['DOCUMENT_ROOT']."/sys/modals/needDiscordID.php");
			// SHOW MODAL
			echo '<script> $(window).on(';
			echo "'load'";
			echo ',function(){ $("#discordIDModal").modal(';
			echo "'show'";
			echo '); }); </script>';
		}
		elseif($needTeamSpeak == TRUE) {
			include($_SERVER['DOCUMENT_ROOT']."/sys/modals/needTeamspeakID.php");
			// SHOW MODAL
			echo '<script> $(window).on(';
			echo "'load'";
			echo ',function(){ $("#tsIDModal").modal(';
			echo "'show'";
			echo '); }); </script>';
		}
	}
}

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-sm navbar-light bg-primary navbar-dark bg-primary fixed-top">
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
								echo '<a href="/home/auth/" class="nav-link">Login</a>';
							} else {
								echo '<li class="nav-item dropdown">';
								echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">';
								echo $displayName;
								echo '</a>';
								echo '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">';
								echo '<a class="dropdown-item" href="';
								echo '/profile/view.php?id=';
								echo $id;
								echo '">View Profile</a>';
								echo '<a class="dropdown-item" href="/profile/settings/">Settings</a>';

								// IF STAFF OR ADMIN OR RECRUITMENT STAFF
								if(isset($recruitmentRank ) && in_array($recruitmentRank,$recruitmentRanks) && $permissionRank !== 'Applicant' || isset($permissionRank) && in_array($permissionRank,$staffRanks) && $permissionRank !== 'Applicant') {
									echo '<div class="dropdown-divider"></div>';
								}
								// IF IS STAFF
								if(in_array($permissionRank ,$staffRanks)) {
									echo '<a class="dropdown-item" href="/staff/">Staff Panel</a>';
								}
								// IF IS ADMIN
								if(in_array($permissionRank ,$adminRanks)) {
									echo '<a class="dropdown-item" href="/admin/">Admin Panel</a>';
								}
								// IF MEMBER OF RT DEPARTMENT
								if(in_array($recruitmentRank ,$recruitmentRanks) && $permissionRank !== 'Applicant') {
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