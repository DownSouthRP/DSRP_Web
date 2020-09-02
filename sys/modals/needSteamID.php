<div class="modal fade" id="steamIDModal" tabindex="-1" role="dialog" aria-labelledby="steamIDModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="steamIDModalLabel">Need Information</h5>
            </div>

            <div class="modal-body">
                <p>We are currently missing some information from you.</p>

                <form action="/sys/scripts/updateSteamID.php" method="post">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputSteamIDLabel">Steam HEX</span>
                        </div>
                        <input type="text" class="form-control" id="inputSteamID" name="inputSteamID" aria-describedby="inputSteamIDLabel" required />
                    </div>
                    
                    <br>

                    <button class="btn btn-primary btn-block" type="submit">Update</button>


                </form>

            </div>

        </div>
    </div>
</div>

