<div class="modal fade" id="tsIDModal" tabindex="-1" role="dialog" aria-labelledby="tsIDModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="tsIDModalLabel">Update Settings</h5>
            </div>

            <div class="modal-body">
                <p>We are currently missing some information from you.</p>

                <form action="/sys/scripts/updateTeamSpeakID.php" method="post">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputTeamSpeakIDLabel">TeamSpeak Unique ID</span>
                        </div>
                        <input type="text" class="form-control" id="inputTeamSpeakID" name="inputTeamSpeakID" aria-describedby="inputSteamIDLabel">
                    </div>
                    
                    <br>

                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                        
                </form>

            </div>

        </div>
    </div>
</div>