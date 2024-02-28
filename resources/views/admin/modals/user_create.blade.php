<!-- User Modal-->
<div class="modal fade" id="userCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="userCreateForm" action="{{ url('user') }}" method="post" onsubmit="submitForm(event)">
                @csrf
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="row mb-2">
                        <div class="col-3">
                            <label for="rank" class="form-label text-primary mb-1">Rank</label>
                            <select class="form-control" id="rank" name="rank">
                                <option selected value></option>
                                @foreach ($codes as $item)
                                @if ($item->category === 'Rank')
                                <option value="{{ $item->id }}">{{ $item->value}}</option>
                                @endif
                                @endforeach
                            </select>
                            <div id="rankCreateError" class="text-danger pl-2 pt-2"></div>

                        </div>
                        <div class="col">
                            <label for="name" class="form-label text-primary mb-1">Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="name" 
                                name="name"
                            >
                            <div id="nameCreateError" class="text-danger pl-2 pt-2"></div>

                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="region" class="form-label text-primary mb-1">Region</label>
                        <select class="form-control" id="region" name="region">
                            <option disabled selected value>Select Region</option>
                            @foreach ($regions as $item)
                                <option value="{{ $item->id }}">{{ $item->region }}</option>
                            @endforeach
                        </select>
                        <div id="regionCreateError" class="text-danger pl-2 pt-2"></div>

                    </div>

                    <div class="mb-2">
                        <label for="office" class="form-label text-primary mb-1">Office</label>
                        <select class="form-control" id="office" name="office">
                            <option disabled selected value>Select Office</option>
                            <!-- Options for offices will be dynamically populated based on the selected region -->
                        </select>
                        <div id="officeCreateError" class="text-danger pl-2 pt-2"></div>
                    </div>

                    <div class="mb-2">
                        <label for="username" class="form-label text-primary mb-1">Username</label>
                        <input 
                            type="username" 
                            class="form-control" 
                            id="username" 
                            name="username"
                            >
                        <div id="usernameCreateError" class="text-danger text-sm pl-2 pt-2"></div>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label text-primary mb-1">Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password"
                            >
                        <div id="passwordCreateError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="role" class="form-label text-primary mb-1">User Type</label>
                            <select class="form-control" id="role" name="role">
                                <option disabled selected value>Select Role</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Viewer">Viewer</option>
                            </select>
                            <div id="roleCreateError" class="text-danger pl-2 pt-2"></div>
                        </div>
                        <div class="col">
                            <label for="is_user" class="form-label text-primary mb-1">User Status</label>
                            <select class="form-control" id="is_user" name="is_user">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <div id="statusCreateError" class="text-danger pl-2 pt-2"></div>
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
            url: $('#userCreateForm').attr('action'),
            data: $('#userCreateForm').serialize(),
            success: function(response) {
                // If submission is successful, display an alert box
                alert('User added successfully!');
                
                // Optionally, you can redirect the user to another page
                window.location.href = "{{ url('user') }}";
            },
            error: function(xhr, status, error) {
                // If there are validation errors, display them in the modal
                var errors = xhr.responseJSON.errors;
                $('#rankCreateError').html(errors.rank ? errors.rank[0] : '');
                $('#nameCreateError').html(errors.name ? errors.name[0] : '');
                $('#regionCreateError').html(errors.region ? errors.region[0] : '');
                $('#officeCreateError').html(errors.office ? errors.office[0] : '');
                $('#usernameCreateError').html(errors.username ? errors.username[0] : '');
                $('#passwordCreateError').html(errors.password ? errors.password[0] : '');
                $('#roleCreateError').html(errors.role ? errors.role[0] : '');
                $('#statusCreateError').html(errors.status ? errors.status[0] : '');
                // Handle other validation errors similarly
            },
            complete: function() {
                // Re-enable the submit button after the request is complete
                $('#createBtn').prop('disabled', false);
            }
        });
    }


    // Disable the 'Office' select tag by default
    document.getElementById('office').disabled = true;

    document.getElementById('region').addEventListener('change', function() {
        var regionId = this.value;
        var officeSelect = document.getElementById('office');
        
        // Clear existing options
        officeSelect.innerHTML = '<option disabled selected value>Select Office</option>';
        
        // Fetch offices based on the selected region using AJAX
        fetch('/get-offices/' + regionId)
            .then(response => response.json())
            .then(data => {
                // Populate the 'Office' dropdown with fetched offices
                data.forEach(function(office) {
                    var option = document.createElement('option');
                    option.value = office.id;
                    option.textContent = office.abbrev;
                    officeSelect.appendChild(option);
                });
            });

        // Enable the 'Office' select tag when a region is selected
        officeSelect.disabled = regionId === ""; 
    });
</script>

