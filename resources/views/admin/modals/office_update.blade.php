<div class="modal fade" id="officeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Office</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form action="" method="post">
            <div class="modal-body px-4 py-3" style="font-size: 0.9em;">

                <div class="mb-3">
                    <label for="region" class="form-label text-primary mb-1">Region</label>
                    <select class="form-control" id="region" name="region">
                        <option value=""></option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="office" class="form-label text-primary mb-1">Office Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="office" 
                        name="office"
                    >
                </div>
                <div class="mb-3">
                    <label for="abbriv" class="form-label text-primary mb-1">Abbriviation</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="abbriv" 
                        name="abbriv"
                    >
                </div>
                <div class="mb-3">
                    <label for="officer" class="form-label text-primary mb-1">Head Officer</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="officer" 
                        name="officer"
                    >
                </div>
                <div class="mb-3">
                    <label for="landline" class="form-label text-primary mb-1">Landline</label>
                    <input 
                        type="tel" 
                        class="form-control" 
                        id="landline" 
                        placeholder="XX-XXXX-XXXX"
                        name="landline"
                    >
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