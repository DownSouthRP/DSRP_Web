<div class="card text-center border-danger">
    <div class="card-header bg-danger">! APPLICATION DENIED !</div>
    <div class="card-body">
        <div class="row">
            <div class=col-md-3></div>
            <div class=col-md-6>
                <div class="card">
                    <div class="card-header">
                        This application has been denied.
                    </div>
                    <div class="card-body bg-secondary">
                        <p><?php echo $appDeniedReasons; ?></p>
                    </div>
                    <div class="card-footer">
                        <?php echo $appStatus; ?>
                    </div>
                </div>
            </div>
            <div class=col-md-3></div>
        </div>
    </div>
</div>