<div class="modal fade" id="officeUpdateModal{{ $office->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Office</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="officeUpdateForm{{ $office->id }}" action="{{ url('office') }}/{{ $office->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="updateRegion{{ $office->id }}" class="form-label text-primary mb-1">Region</label>
                        <select class="form-control" id="updateRegion{{ $office->id }}" name="region">
                            <option disabled selected value>Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->id }}" {{ $office->region == $region->id ? 'Selected' : '' }}>
                                {{ $region->region }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateOffice{{ $office->id }}" class="form-label text-primary mb-1">Office Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateOffice{{ $office->id }}" 
                            name="office"
                            value="{{ $office->office }}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="updateAbbrev{{ $office->id }}" class="form-label text-primary mb-1">Abbreviation</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateAbbrev{{ $office->id }}" 
                            name="abbrev"
                            value="{{ $office->abbrev }}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="updateOfficer{{ $office->id }}" class="form-label text-primary mb-1">Head Officer</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateOfficer{{ $office->id }}" 
                            name="officer"
                            value="{{ $office->officer }}"
                        >
                    </div>
                </div>
                <div class="modal-footer pb-0 mb-3">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function submitForm(event, id) {
        event.preventDefault(); // Prevent default form submission
        
        // Construct form data
        var formData = new FormData(document.getElementById('officeUpdateForm' + id));
    
        // Send an asynchronous request to submit the form data
        fetch("{{ url('office') }}/" + id, {
            method: 'PUT',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // If submission is successful, display an alert box
            alert('Office updated successfully!');
            
            // Optionally, you can close the modal or redirect the user to another page
            $('#officeUpdateModal' + id).modal('hide');
            // window.location.href = "{{ url('office') }}";
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
        });
    }
</script>