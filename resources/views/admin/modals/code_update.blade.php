<div class="modal fade" id="codeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update System Code</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form action="" method="post">
            @csrf
            @method('PUT')
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="category" class="form-label text-primary mb-1">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option disabled selected value>Select Category</option>
                            <option value="Rank">Rank</option>
                            <option value="Crime Group">Crime Group</option>
                            <option value="Crime Type">Crime Type</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label text-primary mb-1">Value</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="value" 
                            name="value"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-primary mb-1">Description</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="description" 
                            name="description"
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


