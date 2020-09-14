<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if($_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
    exit;
}

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");

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
                            <li class="breadcrumb-item active"><a href="/profile/view.php?id=<?php echo $id; ?>">Profile</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php echo $displayName; ?>
                            </li>
                        </ol>
                    </nav>

                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                Welcome, <?php echo $displayName; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    Update Profile Settings
                                </div>
                                <div class="card-body">
                                    <form action="/sys/scripts/updateDisplayName.php" method="post">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="newDisplayName">Display Name</label>
                                                <input type="text" class="form-control" value="<?php echo $displayName; ?>" id="newDisplayName" name="newDisplayName" required/>
                                            </div>
                                            <div class="col">
                                                <!-- <label for="displayName">Display Name</label>
                                                <input type="text" class="form-control" placeholder="First name" id="displayName" name="displayName" required/> -->
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="card">
                                <div class="card-header">
                                    Update IDs
                                </div>
                                <div class="card-body">
                                    <form action="/sys/scripts/updateIDs.php" method="post">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="steamID">Steam HEX</label>
                                                <input type="text" class="form-control" value="<?php echo $steamID; ?>" id="steamID" name="steamID" required/>
                                                <br>
                                                <label for="discordID">TeamSpeak Unique ID</label>
                                                <input type="text" class="form-control" value="<?php echo $discordID; ?>" id="discordID" name="discordID" required/>
                                            </div>
                                            <div class="col">
                                                <label for="teamspeakID">Discord ID</label>
                                                <input type="text" class="form-control" value="<?php echo $teamspeakID; ?>" id="displayName" name="teamspeakID" required/>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Change Profile Banner
                                        </div>
                                        <div class="card-body">
                                            <form action="/sys/scripts/updateIDs.php" method="post">
                                                    <label for="profileBanner">Current Banner URL</label>
                                                    <input type="text" class="form-control" value="<?php echo $profileBanner; ?>" id="profileBanner" name="profileBanner" required/>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                            <br>
                                            <center>
                                                <img src="<?php echo $profileBanner; ?>">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Change Password
                                        </div>
                                        <div class="card-body">
                                            <form action="/sys/scripts_/changePassword.php" method="post">
                                                <div>
                                                    <label for="oldPassword">Old Password</label>
                                                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" required />
                                                </div>

                                                <br>

                                                <div>
                                                    <label for="newPassword">New Password</label>
                                                    <input type="password" class="form-control" id="newPassword" name="newPassword" required />
                                                </div>

                                                <br>

                                                <div>
                                                    <label for="confirmNewPassword">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required />
                                                </div>

                                                <br>

                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="card">
                                <div class="card-header">
                                    Update Email Address
                                </div>
                                <div class="card-body">
                                    <p>- PENDING FUTURE UPDATE -</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <br>

                    <div class="card">
                        <div class="card-header">
                            <center>DownSouthRP Community - 2020</center>
                        </div>
                    </div>

                    <br><br>

                </div>
                
                

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>


<br><br>