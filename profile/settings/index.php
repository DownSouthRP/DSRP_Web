<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if($_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/i/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

?>
<br>
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
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action disabled" id="list-home-list">Welcome, <?php echo $displayName; ?></a>
                                <!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">Home</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile">Profile</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#" role="tab" aria-controls="messages">Messages</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#" role="tab" aria-controls="settings">Settings</a> -->
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
                                                <label for="discordID">Discord ID</label>
                                                <input type="text" class="form-control" value="<?php echo $discordID; ?>" id="discordID" name="discordID" required/>
                                            </div>
                                            <div class="col">
                                                <label for="teamspeakID">TeamSpeak Unique ID</label>
                                                <input type="text" class="form-control" value="<?php echo $teamspeakID; ?>" id="teamspeakID" name="teamspeakID" required/>
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
                                            <form action="/sys/scripts/updateProfileBanner.php" method="post">
                                                    <label for="newProfileBanner">Current Banner URL</label>
                                                    <input type="text" class="form-control" value="<?php echo $profileBanner; ?>" id="newProfileBanner" name="newProfileBanner" required/>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                            <br>
                                            <center>
                                                <img style="width:90%;" src="<?php echo $profileBanner; ?>">
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
                                            <form action="/sys/scripts/er.php" method="post">
                                                <button class="btn btn-primary" type="submit">Request Password Change</button>
                                            </form>
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