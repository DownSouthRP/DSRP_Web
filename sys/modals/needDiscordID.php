<div class="modal fade" id="discordIDModal" tabindex="-1" role="dialog" aria-labelledby="discordIDModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="discordIDModalLabel">Need Information</h5>
            </div>

            <div class="modal-body">
                <p>We are currently missing some information from you.</p>

                <form action="/sys/scripts/updateDiscordID.php" method="post">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputDiscordIDLabel">Discord ID</span>
                        </div>
                        <input type="text" class="form-control" id="inputDiscordID" name="inputDiscordID" aria-describedby="inputSteamIDLabel" required />
                    </div>
                    
                    <br>

                    <button class="btn btn-primary btn-block" type="submit">Update</button>


                </form>

            </div>

        </div>
    </div>
</div>
