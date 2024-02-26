<div class="modal fade" id="codeCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add System Code</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="codeForm" action="{{ url('code') }}" method="post" onsubmit="submitForm(event)">
                @csrf
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="category" class="form-label text-primary mb-1">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option disabled selected value>Select Category</option>
                            <option value="Rank">Rank</option>
                            <option value="Crime Group">Crime Group</option>
                            <option value="Crime Type">Crime Type</option>
                        </select>
                        <div id="categoryError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label text-primary mb-1">Value</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="value" 
                            name="value"
                        >
                        <div id="valueError" class="text-danger pl-2 pt-2"></div>
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
                    <div id="descriptionError" class="text-danger pt-2"></div>
                </div>
                
                <div class="modal-footer pb-0 mb-3">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="submitBtn" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function submitForm(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Send an asynchronous request to submit the form data
        $.ajax({
            type: 'POST',
            url: $('#codeForm').attr('action'),
            data: $('#codeForm').serialize(),
            success: function(response) {
                // If submission is successful, display an alert box
                alert('System Code added successfully!');
                
                // Optionally, you can redirect the user to another page
                window.location.href = "{{ url('code') }}";
            },
            error: function(xhr, status, error) {
                // If there are validation errors, display them in the modal
                var errors = xhr.responseJSON.errors;
                $('#categoryError').html(errors.category ? errors.category[0] : '');
                $('#valueError').html(errors.value ? errors.value[0] : '');
                // Handle other validation errors similarly
            }
        });
    }
</script>
