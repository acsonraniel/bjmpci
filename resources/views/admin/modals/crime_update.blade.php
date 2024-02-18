<div class="modal fade" id="crimeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Crime</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form action="" method="post">
                
                <div class="odal-body px-4 py-3" style="font-size: 0.9em;">

                    <div class="row mb-3">
                        <div class="col">
                            <label for="type" class="form-label text-primary mb-1">Type</label>
                            <select type="text" class="form-control" id="type" name="type">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="group" class="form-label text-primary mb-1">Group</label>
                            <select type="text" class="form-control" id="group" name="group">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="crime" class="form-label text-primary mb-1">Crime</label>
                        <textarea 
                            class="form-control"
                            style="resize: none;"
                            rows="3"
                            id="crime" 
                            name="crime"
                        ></textarea>
                    </div>

                    <label for="" class="form-label text-primary mb-1">Minimum Sentence</label>
                    <div class="row mb-3" style="font-size: 0.9em;">
                        <div class="col">
                            <label for="minYear" class="form-label mb-1">Years</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="minYear"
                                name="minYear"
                            >
                        </div>
                        <div class="col">
                            <label for="minMonth" class="form-label mb-1">Months</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="minMonth"
                                name="minMonth"
                            >
                        </div>
                        <div class="col">
                            <label for="minDay" class="form-label mb-1">Days</label>
                            <input
                                type="number" 
                                class="form-control" 
                                id="minDay"
                                name="minDay"
                            >
                        </div>
                    </div>

                    <label for="" class="form-label text-primary mb-1">Maximum Sentence</label>
                    <div class="row mb-3" style="font-size: 0.9em;">
                        <div class="col">
                            <label for="maxYear" class="form-label mb-1">Years</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="maxYear"
                                name="maxYear"
                            >
                        </div>
                        <div class="col">
                            <label for="maxMonth" class="form-label mb-1">Months</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="maxMonth"
                                name="maxMonth"
                            >
                        </div>
                        <div class="col">
                            <label for="maxDay" class="form-label mb-1">Days</label>
                            <input
                                type="number" 
                                class="form-control" 
                                id="maxDay"
                                name="maxDay"
                            >
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="type" class="form-label text-primary mb-1">Bailable</label>
                            <select class="form-control" id="bailable" name="bailable">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pb-0 mb-3">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="#">Submit</a>
                </div>
            </form>

        </div>
    </div>
</div>