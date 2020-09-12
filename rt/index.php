<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include($_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php");
include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/rt/i/header.php");

// GET ALL PENDING REVIEW APPS
$getPendingAppCount = " SELECT COUNT(*) FROM apps WHERE appStatus = 'Application Submitted - Pending Review' ";
$getPendingCountResult = mysqli_query($con, $getPendingAppCount);
$getPendingCountResultRow = mysqli_fetch_array($getPendingCountResult);

// GET ALL PENDING LEAD REVIEW APPS
$getPendingLeadAppCount = " SELECT COUNT(*) FROM apps WHERE appStatus = 'Application Submitted - Pending Lead Review' ";
$getPendingLeadCountResult = mysqli_query($con, $getPendingLeadAppCount);
$getPendingLeadCountResultRow = mysqli_fetch_array($getPendingLeadCountResult);

// GET ALL ACCEPTED APPS
$getAcceptedAppCount = " SELECT COUNT(*) FROM apps WHERE appStatus = 'Application Accepted' ";
$getAcceptedCountResult = mysqli_query($con, $getAcceptedAppCount);
$getAcceptedCountResultRow = mysqli_fetch_array($getAcceptedCountResult);

// GET ALL DENIED APPS
$getDeniedAppCount = " SELECT COUNT(*) FROM apps WHERE appStatus = 'Application Denied' ";
$getDeniedCountResult = mysqli_query($con, $getDeniedAppCount);
$getDeniedCountResultRow = mysqli_fetch_array($getDeniedCountResult);

// DISPLAY GET ALLs
$pendingApps = $getPendingCountResultRow[0];
$pendingLeadApps = $getPendingLeadCountResultRow[0];
$deniedApps = $getDeniedCountResultRow[0];
$acceptedApps = $getAcceptedCountResultRow[0];

?>

<!-- TOP STATS -->
<div class="container-fluid">
	<div class="row">

		<div class="col-md-3">
			<div class="card text-white bg-secondary mb-3" style="max-width: 100%;">
				<div class="card-header"><b>Applications Pending Review</b></div>
				<div class="card-body">
					<center>
						<h4><?php echo $pendingApps;?></h4>
						<br>
						<h5>Applications</h5>
					</center>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block">VIEW ALL IN CATEGORY</button>
                </div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-white bg-secondary mb-3" style="max-width: 100%;">
				<div class="card-header"><b>Applications Pending Lead Review</b></div>
				<div class="card-body">
					<center>
						<h4><?php echo $pendingLeadApps;?></h4>
						<br>
						<h5>Applications</h5>
					</center>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block">VIEW ALL IN CATEGORY</button>
                </div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-white bg-secondary mb-3" style="max-width: 100%;">
				<div class="card-header"><b>Applications Denied</b></div>
				<div class="card-body">
					<center>
						<h4><?php echo $deniedApps;?></h4>
						<br>
						<h5>Applications</h5>
					</center>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block">VIEW ALL IN CATEGORY</button>
                </div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="card text-white bg-secondary mb-3" style="max-width: 100%;">
				<div class="card-header"><b>Applications Accepted</b></div>
				<div class="card-body">
					<center>
						<h4><?php echo $acceptedApps;?></h4>
						<br>
						<h5>Applications</h5>
					</center>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block">VIEW ALL IN CATEGORY</button>
                </div>
			</div>
		</div>

	</div>
</div>
<br>

<!-- SIDEBAR & OTHER CONTENTS -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<!-- SIDEBAR -->
				<div class="col-md-3">

                    <div class="card" style="width: 100%;">
                        <div class="card-header">Recruitment Portal</div>
                        <ul class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action">------</a>
                            <a class="list-group-item list-group-item-action">------</a>
                            <a class="list-group-item list-group-item-action">------</a>
                            <a class="list-group-item list-group-item-action">------</a>
                        </ul>
                    </div>

				</div>

				<div class="col-md-9">
                    
                    <table class="table table-hover table-striped table-bordered bg-dark">
                        <thead>
                            <tr class="bg-primary">
                                <th><center>App ID</center></th>
                                <th><center>Applicant Name</center></th>
                                <th><center>Applicant Profile</center></th>
                                <th><center>Application View</center></th>
                                <th><center>Application Status</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // GET ALL PENDING REVIEW APPS
                                $getPendingAppsSQL = " SELECT * FROM apps WHERE appStatus = 'Application Submitted - Pending Review' ";
                                $getPendingAppsResult = mysqli_query($con, $getPendingAppsSQL);

                                while($appRow = mysqli_fetch_array($getPendingAppsResult)) {
                                    echo '<tr>';

                                    echo '<td><center>';
                                    echo $appRow['id'];
                                    echo '</center></td>'; 

                                    echo '<td><center>';
                                    echo $appRow['name'];
                                    echo '</center></td>'; 

                                    echo '<td><center>';
                                    echo '<a class="btn btn-outline-info btn-block" href="/profile/view.php?id=' . $appRow['appUser'] . '" target="_blank">' . $appRow['name'] . "'s" . ' Profile</a>';
                                    echo '</center></td>'; 

                                    echo '<td><center>';
                                    echo '<a class="btn btn-outline-info btn-block" href=/rt/view.php?id=' . $appRow['id'] . '" target="_blank">View Here</a>';
                                    echo '</center></td>'; 

                                    echo '<td><center>';
                                    echo $appRow['appStatus'];
                                    echo '</center></td>'; 

                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
