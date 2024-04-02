<div class="modal fade" id="crimeCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Crime</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="crimeCreateForm" action="{{ url('crime') }}" method="post" onsubmit="submitForm(event)">
                @csrf
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="type" class="form-label text-primary mb-1">Crime Type</label>
                            <select type="text" class="form-control" id="type" name="type">
                                <option selected>Not Applicable</option>
                                @foreach ($codes as $item)
                                @if ($item->category === 'Crime Type')
                                <option value="{{ $item->id }}">{{ $item->value}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="group" class="form-label text-primary mb-1">Crime Group</label>
                            <select type="text" class="form-control" id="group" name="group">
                                <option selected>Not Applicable</option>
                                @foreach ($codes as $item)
                                @if ($item->category === 'Crime Group')
                                <option value="{{ $item->id }}">{{ $item->value}}</option>
                                @endif
                                @endforeach
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
                        <div id="crimeCreateError" class="text-danger pl-2 pt-2"></div>
                    </div>

                    <label class="form-label text-primary mb-1">Minimum Sentence</label>
                    <div class="row mb-3" style="font-size: 0.9em;">
                        <div class="col">
                            <label for="minYear" class="form-label mb-1">Years</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="minYear"
                                name="min_year"
                                value="0"
                                required
                            >
                        </div>
                        <div class="col">
                            <label for="minMonth" class="form-label mb-1">Months</label>
                            <input 
                                type="number"
                                class="form-control" 
                                id="minMonth"
                                name="min_month"
                                max="11"
                                value="0"
                                required
                            >
                        </div>
                        <div class="col">
                            <label for="minDay" class="form-label mb-1">Days</label>
                            <input
                                type="number" 
                                class="form-control" 
                                id="minDay"
                                name="min_day"
                                max="30"
                                value="0"
                                required
                            >
                        </div>
                    </div>

                    <label class="form-label text-primary mb-1">Maximum Sentence</label>
                    <div class="row mb-3" style="font-size: 0.9em;">
                        <div class="col">
                            <label for="maxYear" class="form-label mb-1">Years</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="maxYear"
                                name="max_year"
                                value="0"
                                required
                            >
                        </div>
                        <div class="col">
                            <label for="maxMonth" class="form-label mb-1">Months</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="maxMonth"
                                name="max_month"
                                max="11"
                                value="0"
                                required
                            >
                        </div>
                        <div class="col">
                            <label for="maxDay" class="form-label mb-1">Days</label>
                            <input
                                type="number" 
                                class="form-control" 
                                id="maxDay"
                                name="max_day"
                                max="30"
                                value="0"
                                required
                            >
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col">
                            <label for="bailable" class="form-label text-primary mb-1">Bailable</label>
                            <select class="form-control" id="bailable" name="bailable">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="disqualified" class="form-label text-primary mb-1">TA Disqualified</label>
                            <select class="form-control" id="disqualified" name="bailable">
                                <option value="1">Yes</option>
                                <option value="0" selected>No</option>
                            </select>
                        </div>
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
            url: $('#crimeCreateForm').attr('action'),
            data: $('#crimeCreateForm').serialize(),
            success: function(response) {
                // If submission is successful, display an alert box
                alert('Crime added successfully!');
                
                // Optionally, you can redirect the user to another page
                window.location.href = "{{ url('crime') }}";
            },
            error: function(xhr, status, error) {
                // If there are validation errors, display them in the modal
                var errors = xhr.responseJSON.errors;
                $('#crimeCreateError').html(errors.crime ? errors.crime[0] : '');
                // Handle other validation errors similarly
            },
            complete: function() {
                // Re-enable the submit button after the request is complete
                $('#createBtn').prop('disabled', false);
            }
        });
    }
</script>