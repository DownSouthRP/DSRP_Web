<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/i/header.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">

            <center><img style="width:100%;height:auto;" class="rounded" src="/sys/design/imgs/dsrpBanner.png"><br></center>
        
            <br>

            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <center>
                                        <img style="width:25%;height:auto;" src="/sys/design/imgs/dsrpLogo.png"><br><br>
                                        <p style="font-size:20px;">Down South Roleplay Community was founded in 2020 by Jay & Braden. Along with some friends, they want to enhance the roleplay without having many restrictions. Our main purpose here at Down South Roleplay is to make RP better for everyone.</p>
                                    </center>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <center><h4>Quick References</h4></center>
                            <button class="btn btn-primary btn-block" type="button" href="https://discord.gg/Qg8Hkwb" target="_blank" class="btn btn-secondary">Public Relations Discord</button>
                            <button class="btn btn-primary btn-block" type="button" href="https://docs.google.com/document/d/1bJD8NXZcOrDvoekknZ48Bx8A14zjy8wENxTlgvVWtCI/edit" target="_blank" class="btn btn-secondary">Community Rules</button>
                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body">
                            <center><h4>Application Status</h4>
                                <br>
                                <?php
                                    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getDSRPInfo.php";
                                    if($getDSRPInfoRow['appStatus'] == "TRUE") {
                                        echo '<a class="btn btn-primary" href="/apps/">CURRENTLY OPEN</a>';
                                    } else {
                                        echo '<button class="btn btn-primary disabled">CURRENTLY CLOSED</button>';
                                    }
                                    
                                ?>
                                </center>
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

        <div class="col-md-2"></div>

    </div>
</div>
