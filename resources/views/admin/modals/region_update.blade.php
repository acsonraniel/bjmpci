<div class="modal fade" id="regionUpdateModal{{ $region->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Region</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="regionUpdateForm{{ $region->id }}" action="{{ url('region') }}/{{ $region->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="updateRegion{{ $region->id }}" class="form-label text-primary mb-1">Region Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateRegion{{ $region->id }}" 
                            name="region"
                            value="{{ $region->region }}"
                        >
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="updateRank{{ $region->id }}" class="form-label text-primary mb-1">Rank</label>
                            <select class="form-control" id="updateRank{{ $region->id }}" name="rank">
                                <option selected value></option>
                                @foreach ($codes->where('category', 'Rank') as $rank)
                                <option value="{{ $rank->id }}" {{ $rank->id == $region->rank ? 'Selected' : '' }}>
                                    {{ $rank->value }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="updateName{{ $region->id }}" class="form-label text-primary mb-1">Director Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="updateName{{ $region->id }}" 
                                name="name"
                                value="{{ $region->name }}"
                            >
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="updateAddress{{ $region->id }}" class="form-label text-primary mb-1">Regional Office Address</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateAddress{{ $region->id }}" 
                            name="address"
                            value="{{ $region->address }}"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="updateLandline{{ $region->id }}" class="form-label text-primary mb-1">Landline</label>
                        <input 
                            type="tel" 
                            class="form-control" 
                            id="updateLandline{{ $region->id }}" 
                            placeholder="XX-XXXX-XXXX"
                            name="landline"
                            value="{{ $region->landline }}"
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
        var formData = new FormData(document.getElementById('regionUpdateForm' + id));
    
        // Send an asynchronous request to submit the form data
        fetch("{{ url('region') }}/" + id, {
            method: 'PUT',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // If submission is successful, display an alert box
            alert('Region updated successfully!');
            
            // Optionally, you can close the modal or redirect the user to another page
            $('#regionUpdateModal' + id).modal('hide');
            // window.location.href = "{{ url('office') }}";
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
        });
    }
</script>