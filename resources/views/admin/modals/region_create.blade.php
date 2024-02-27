<div class="modal fade" id="regionCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Region</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="regionCreateForm" action="{{ url('region') }}" method="post" onsubmit="submitForm(event)">
            @csrf
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="region" class="form-label text-primary mb-1">Region Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="region" 
                            name="region"
                        >
                        <div id="regionCreateError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="rank" class="form-label text-primary mb-1">Rank</label>
                            <select class="form-control" id="rank" name="rank">
                                <option disabled selected value></option>
                                @foreach ($codes as $item)
                                @if ($item->category === 'Rank')
                                <option value="{{ $item->id }}">{{ $item->value}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="name" class="form-label text-primary mb-1">Director Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="name" 
                                name="name"
                            >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label text-primary mb-1">Regional Office Address</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="address" 
                            name="address"
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
                    <button id="createBtn" class="btn btn-primary">Submit</button>
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
            url: $('#regionCreateForm').attr('action'),
            data: $('#regionCreateForm').serialize(),
            success: function(response) {
                // If submission is successful, display an alert box
                alert('Region added successfully!');
                
                // Optionally, you can redirect the user to another page
                window.location.href = "{{ url('region') }}";
            },
            error: function(xhr, status, error) {
                // If there are validation errors, display them in the modal
                var errors = xhr.responseJSON.errors;
               $('#regionCreateError').html(errors.region ? errors.region[0] : '');
                // Handle other validation errors similarly
            },
            complete: function() {
                // Re-enable the submit button after the request is complete
                $('#createBtn').prop('disabled', false);
            }
        });
    }
</script>