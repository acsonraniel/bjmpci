<!-- User Modal-->
<div class="modal fade" id="userUpdateModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="userUpdateForm{{ $user->id }}" action="{{ url('user') }}/{{ $user->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="row mb-2">
                        <div class="col-3">
                            <label for="updateRank{{ $user->id }}" class="form-label text-primary mb-1">Rank</label>
                            <select class="form-control" id="updateRank{{ $user->id }}" name="rank">
                                <option selected value=""></option>
                                @foreach ($codes->where('category', 'Rank') as $rank)
                                <option value="{{ $rank->id }}" {{ $rank->id == $user->rank ? 'Selected' : '' }}>
                                    {{ $rank->value }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="updateName{{ $user->id }}" class="form-label text-primary mb-1">Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="updateName{{ $user->id }}" 
                                name="name"
                                value="{{ $user->name }}"
                            >
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="updateRegion{{ $user->id }}" class="form-label text-primary mb-1">Region</label>
                        <select class="form-control" id="updateRegion{{ $user->id }}" name="region">
                            <option disabled selected value>Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->id }}" {{ $user->region == $region->id ? 'selected' : '' }}>
                                {{ $region->region }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-2">
                        <label for="updateOffice{{ $user->id }}" class="form-label text-primary mb-1">Office</label>
                        <select class="form-control" id="updateOffice{{ $user->id }}" name="office">
                            <option disabled selected value>Select Office</option>
                            @foreach ($offices->where('region', $user->region) as $office)
                            <option value="{{ $office->id }}" {{ $user->office == $office->id ? 'selected' : '' }}>
                                {{ $office->abbrev }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="updateUsername{{ $user->id }}" class="form-label text-primary mb-1">Username</label>
                        <input 
                            type="username" 
                            class="form-control" 
                            id="updateUsername{{ $user->id }}" 
                            name="username"
                            value="{{ $user->username }}"
                            >
                    </div>
                    <div class="mb-2">
                        <label for="updatePassword{{ $user->id }}" class="form-label text-primary mb-1">Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="updatePassword{{ $user->id }}" 
                            name="password"
                            >
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="updateRole{{ $user->id }}" class="form-label text-primary mb-1">User Type</label>
                            <select class="form-control" id="updateRole{{ $user->id }}" name="role">
                                <option disabled selected value>Select Role</option>
                                <option value="Administrator" {{ $user->role == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                <option value="Viewer" {{ $user->role == 'Viewer' ? 'selected' : '' }}>Viewer</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="updateIs_user{{ $user->id }}" class="form-label text-primary mb-1">User Status</label>
                            <select class="form-control" id="updateIs_user{{ $user->id }}" name="is_user">
                                <option value="1" {{ $user->is_user == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $user->is_user == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
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
    document.getElementById('updateRegion{{ $user->id }}').addEventListener('change', function() {
        var regionId = this.value;
        console.log('Selected region ID:', regionId); // Debug statement

        var officeSelect = document.getElementById('updateOffice{{ $user->id }}');
        officeSelect.innerHTML = ''; // Clear existing options

        fetch("{{ url('get-offices') }}/" + regionId)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Fetched offices:', data); // Debug statement

                data.forEach(office => {
                    var option = document.createElement('option');
                    option.value = office.id;
                    option.text = office.abbrev;
                    officeSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching offices:', error);
            });
    });
</script>

<script>
    function submitForm(event, id) {
        event.preventDefault(); // Prevent default form submission
        
        // Construct form data
        var formData = new FormData(document.getElementById('userUpdateForm' + id));
    
        // Send an asynchronous request to submit the form data
        fetch("{{ url('user') }}/" + id, {
            method: 'PUT',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // If submission is successful, display an alert box
            alert('User updated successfully!');
            
            // Optionally, you can close the modal or redirect the user to another page
            $('#userUpdateModal' + id).modal('hide');
            // window.location.href = "{{ url('office') }}";
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
        });
    }
</script>






