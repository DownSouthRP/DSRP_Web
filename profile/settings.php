<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION['loggedin'] !== TRUE && is_null($_GET['id'])) {
	echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
}

if(is_null($getCurrentUserRow['id'])) {
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
                                <div class="card-body">
                                    <h3 class="card-title">Profile Display Name</h3>
                                    
                                    <p>Want to update your display name? Just change it below and click that fancy button!</p>
                                    
                                    <form action="scripts/updateDisplayName.php" method="post">
                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['displayName']?>" readonly>
                                        <br>
                                        <label for="newDisplayName">New Display Name</label>
                                        <input type="text" class="form-control" name="newDisplayName" id="newDisplayName" required/>

                                        <br>
                                        <button class="btn btn-primary" type="submit">UPDATE</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Update Email Address</h3>
                                    
                                    <p>Is your current email getting old? Want to use a new one! Change that now!</p>
                                    
                                    <form action="scripts/changeEmailAddress.php" method="post">
                                        <input class="form-control" type="text" placeholder="Currently: <?php echo $getCurrentUserRow['email']?>" readonly>
                                        <br>
                                        <label for="newEmailAddress">New Email Address</label>
                                        <input type="text" class="form-control" name="newEmailAddress" id="newEmailAddress" required/>

                                        <br>
                                        <button class="btn btn-primary" type="submit">UPDATE</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Change Account Password</h3>
                                    
                                    <p>Update your account password.</p>
                                    
                                    <form action="scripts/changePassword.php" method="post">
                                        <label for="oldPassword">Old Password</label>
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" required/>

                                        <label for="newPassword">New Password</label>
                                        <input type="password" class="form-control" name="newPassword" id="newPassword" required/>

                                        <label for="confirmNewPassword">Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" required/>

                                        <br>
                                        <button class="btn btn-primary" type="submit">UPDATE</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">

                            <!-- <div class="card">
                                <div class="card-body">

                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
    </div>
</div>