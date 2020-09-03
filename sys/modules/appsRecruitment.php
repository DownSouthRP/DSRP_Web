<div class="card">
    <div class="card-body">
        <h3 class="card-title">Recruitment Application</h3>
        <br>
        <?php

            if($appCount < '1') {
                echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
            }
            // IF THERE IS MORE THAN ONE APP
            elseif($currentCycleCount <= '1') {
                echo '<a class="btn btn-secondary btn-block" disabled>OPEN NEW APPLICATION</a>';
                echo '<br><center><div class="alert alert-danger" role="alert"><b>YOU CURRENTLY HAVE AN APPLICATION ON FILE THIS CYCLE</b></div></center>';
                echo '<br><a class="btn btn-info btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
            }
            // IF THERE IS MORE THAN ONE APP WITH NO APPS THIS CYCLE
            elseif($appCount >= '1') {
                echo '<a class="btn btn-primary btn-block" href="app.php">OPEN NEW APPLICATION</a>';
                echo '<br><a class="btn btn-info btn-block" data-toggle="modal" data-target="#appsModal">VIEW APPLICATIONS</a>';
            } else {
                echo '<center><div class="alert alert-danger" role="alert">AN ERROR HAS OCCURED</div></center>';
            }
        ?>
        
    </div>
</div>