<div class="modal fade" id="officeCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Office</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="officeCreateForm" action="{{ url('office') }}" method="post" onsubmit="submitForm(event)">
            @csrf
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="region" class="form-label text-primary mb-1">Region</label>
                        <select class="form-control" id="region" name="region">
                            <option disabled selected value>Select Region</option>
                            @foreach ($regions as $item)
                            <option value="{{ $item->id }}">{{ $item->region }}</option>
                            @endforeach
                        </select>
                        <div id="regionCreateError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="office" class="form-label text-primary mb-1">Office Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="office" 
                            name="office"
                        >
                        <div id="officeCreateError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="abbrev" class="form-label text-primary mb-1">Abbreviation</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="abbrev" 
                            name="abbrev"
                        >
                        <div id="abbrevCreateError" class="text-danger pl-2 pt-2"></div>
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
                </div>
            
                <div class="modal-footer pb-0 mb-3">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input id="createBtn" type="submit" class="btn btn-primary" value="Submit">
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    function submitForm(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Disable the submit button to prevent multiple submissions
        $('#createBtn').prop('disabled', true);

        // Send an asynchronous request to submit the form data
        $.ajax({
            type: 'POST',
            url: $('#officeCreateForm').attr('action'),
            data: $('#officeCreateForm').serialize(),
            success: function(response) {
                // If submission is successful, display an alert box
                alert('Office added successfully!');
                
                // Optionally, you can redirect the user to another page
                window.location.href = "{{ url('office') }}";
            },
            error: function(xhr, status, error) {
                // If there are validation errors, display them in the modal
                var errors = xhr.responseJSON.errors;
                $('#regionCreateError').html(errors.region ? errors.region[0] : '');
                $('#officeCreateError').html(errors.office ? errors.office[0] : '');
                $('#abbrevCreateError').html(errors.abbrev ? errors.abbrev[0] : '');
                // Handle other validation errors similarly
            },
            complete: function() {
                // Re-enable the submit button after the request is complete
                $('#createBtn').prop('disabled', false);
            }
        });
    }
</script>