<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");

if($_SESSION['loggedin'] !== TRUE || is_null($getCurrentUserRow['id'])) {
	echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
}


?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
                <div class="col-md-2">
                </div>
                
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="/home/index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="/profile/view.php?id=<?php echo $getCurrentUserRow['id'];?>">Profile</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php if(isset($getCurrentUserRow['displayName'])) {echo $getCurrentUserRow['displayName'];}?>
                            </li>
                        </ol>
                    </nav>

                    <br>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header bg-secondary">Profile Display Name</div>
                                
                                <form action="/sys/scripts/updateDisplayName.php" method="post">
                                
                                    <div class="card-body">

                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['displayName']?>" readonly>
                                        <br>
                                        <label for="newDisplayName">New Display Name</label>
                                        <input type="text" class="form-control" name="newDisplayName" id="newDisplayName" required/>

                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                                </form>
                            </div>

                            <br>

                            <div class="card">
                                <div class="card-header bg-secondary">Change Account Password</div>
                                
                                <form action="/sys/scripts/changePassword.php" method="post">
                                
                                    <div class="card-body">
                                        
                                        <label for="oldPassword">Current Password</label>
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" required/>

                                        <br>

                                        <label for="newPassword">New Password</label>
                                        <input type="password" class="form-control" name="newPassword" id="newPassword" required/>

                                        <br>

                                        <label for="confirmNewPassword">Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" required/>

                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header bg-secondary">Email Address</div>
                                
                                <form action=/sys/scripts/changeEmailAddress.php" method="post">
                                
                                    <div class="card-body">

                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['email']?>" readonly>
                                        <br>
                                        <label for="newEmailAddress">New Email Address</label>
                                        <input type="text" class="form-control" name="newEmailAddress" id="newEmailAddress" required/>

                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                                </form>
                            </div>

                            <br>

                            <div class="card">
                                <div class="card-header bg-secondary"><?php if($needSteam == FALSE) {echo '<span class="badge badge-success">Authenticated</span>';} else { echo '<span class="badge badge-danger">Error</span>';} ?>  Steam HEX</div>

                                <form action="/sys/scripts/updateSteamID.php" method="post">
                                
                                    <div class="card-body">

                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['steamID']?>" readonly>
                                        <br>
                                        <label for="inputSteamID">New Steam HEX</label>
                                        <input class="form-control" type="text" id ="inputSteamID" name="inputSteamID" required/>

                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                                </form>
                            </div>

                            <br>

                            <div class="card">
                                <div class="card-header bg-secondary"><?php if($needDiscord == FALSE) {echo '<span class="badge badge-success">Authenticated</span>';} else { echo '<span class="badge badge-danger">Error</span>';} ?>  Discord ID</div>

                                <form action="/sys/scripts/updateDiscordID.php" method="post">
                                
                                    <div class="card-body">

                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['discordID']?>" readonly>
                                        <br>
                                        <label for="inputDiscordID">New Discord ID</label>
                                        <input class="form-control" type="text" id ="inputDiscordID" name="inputDiscordID" required/>

                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                                </form>
                            </div>

                            <br>

                            <div class="card">
                                <div class="card-header bg-secondary"><?php if($needTeamSpeak == FALSE) {echo '<span class="badge badge-success">Authenticated</span>';} else { echo '<span class="badge badge-danger">Error</span>';} ?>  TeamSpeak Unique ID</div>

                                <form action="/sys/scripts/updateTeamSpeakID.php" method="post">
                                
                                    <div class="card-body">

                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['teamspeakID']?>" readonly>
                                        <br>
                                        <label for="inputTeamSpeakID">New TeamSpeak Unique ID</label>
                                        <input class="form-control" type="text" id ="inputTeamSpeakID" name="inputTeamSpeakID" required/>

                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>


<br><br>