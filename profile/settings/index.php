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
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                Welcome, <?php echo $getCurrentUserRow['displayName']; ?>
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
                                                <input type="text" class="form-control" value="<?php echo $getCurrentUserRow['displayName']; ?>" id="newDisplayName" name="newDisplayName" required/>
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
                                                <input type="text" class="form-control" value="<?php echo $getCurrentUserRow['steamID']; ?>" id="steamID" name="steamID" required/>
                                                <br>
                                                <label for="discordID">TeamSpeak Unique ID</label>
                                                <input type="text" class="form-control" value="<?php echo $getCurrentUserRow['discordID']; ?>" id="discordID" name="discordID" required/>
                                            </div>
                                            <div class="col">
                                                <label for="teamspeakID">Discord ID</label>
                                                <input type="text" class="form-control" value="<?php echo $getCurrentUserRow['teamspeakID']; ?>" id="displayName" name="teamspeakID" required/>
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
                                            Update Email Address
                                        </div>
                                        <div class="card-body">
                                            <p>- PENDING FUTURE UPDATE -</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Change Password
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
                                    Change Profile Banner
                                </div>
                                <div class="card-body">
                                    <form action="/sys/scripts/updateIDs.php" method="post">
                                            <label for="profileBanner">Current Banner URL</label>
                                            <input type="text" class="form-control" value="<?php echo $getCurrentUserRow['profileBanner']; ?>" id="profileBanner" name="profileBanner" required/>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
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