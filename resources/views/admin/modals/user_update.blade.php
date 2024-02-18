<!-- User Modal-->
<div class="modal fade" id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> User</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form action="" method="post">

            <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="rank" class="form-label text-primary mb-1">Rank</label>
                        <select class="form-control" id="rank" name="rank">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label text-primary mb-1">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>

                <div class="mb-3">
                        <label for="region" class="form-label text-primary mb-1">Region</label>
                        <select class="form-control" id="region" name="region">
                            <option value=""></option>
                        </select>
                </div>

                <div class="mb-3">
                        <label for="office" class="form-label text-primary mb-1">Office</label>
                        <select class="form-control" id="office" name="office">
                            <option value=""></option>
                        </select>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="username" class="form-label text-primary mb-1">Username</label>
                        <input type="username" class="form-control" id="username" name="username">
                    </div>
                    <div class="col">
                        <label for="password" class="form-label text-primary mb-1">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <label for="role" class="form-label text-primary mb-1">User Type</label>
                        <select class="form-control" id="role" name="role">
                            <option value="admin">Administrator</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="modal-footer pb-0 mb-3">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>

            </form>

        </div>
    </div>
</div>