<!-- ACCEPTED -->
<div class="modal fade" id="acceptedModal" tabindex="-1" role="dialog" aria-labelledby="acceptedModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptedModalLabel">Accept Application #<?php echo $appID; ?> </h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <p>You are about to send this user the following message along with accepting their app. Confirm below.</p>
                <center><img style="width:50%;" src="/sys/design/imgs/rtAccepted.png"></center>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="/sys/scripts/recruitmentAcceptApp.php" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Application ID</span>
                                </div>
                                <input type="text" value="<?php echo $appID; ?>" class="form-control" id="acceptAppID" name="acceptAppID" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-success btn-block border-white" type="submit">Accept</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PENDING -->
<div class="modal fade" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="pendingModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendingModalLabel">Set Application #<?php echo $appID; ?> Pending</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <p>You are about to set this app to pending. Confirm below and add a note.</p>
                <center><img style="width:50%;" src="/sys/design/imgs/rtPending.png"></center>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="/sys/scripts/recruitmentAppPending.php" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="pendingSelect">Who needs to review this application?</span>
                                </div>
                                <select class="custom-select" id="pendingSelect" name="pendingSelect" required>
                                    <option selected disabled></option>
                                    <option value="Department Supervisors">Department Supervisors</option>
                                    <option value="DSRP Administration">DSRP Administration</option>
                                    <option value="DSRP Staff">DSRP Staff</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Notes</span>
                                </div>
                                <textarea class="form-control" id="pendingNotes" name="pendingNotes" placeholder="This is where we can put notes such as 'Former Member' and '3x Apps'."><?php echo $appNotes; ?></textarea>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Application ID</span>
                                </div>
                                <input type="text" value="<?php echo $appID; ?>" class="form-control" id="pendingAppID" name="pendingAppID" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-warning btn-block border-white" type="submit">Set Pending</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DENIED -->
<div class="modal fade" id="deniedModal" tabindex="-1" role="dialog" aria-labelledby="deniedModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deniedModalLabel">Deny Application #<?php echo $appID; ?> </h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
            <p>You are about deny this application. Confirm below and add the reasonings, and a note.</p>
                <center><img style="width:50%;" src="/sys/design/imgs/rtDenied.png"></center>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form action="/sys/scripts/recruitmentAppDenied.php" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Denial Reasons</span>
                                </div>
                                <textarea class="form-control" id="denialReasons" name="denialReasons" aria-label="With textarea" required></textarea>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Application ID</span>
                                </div>
                                <input type="text" value="<?php echo $appID; ?>" class="form-control" id="deniedAppID" name="deniedAppID" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-danger btn-block border-white" type="submit">Set Denied</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>