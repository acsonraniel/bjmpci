<!-- User Modal-->
<div class="modal fade" id="userCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> User</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form action="{{ url('user') }}" method="post">
            @csrf
            <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="rank" class="form-label text-primary mb-1">Rank</label>
                        <select class="form-control" id="rank" name="rank" required>
                            <option disabled selected value></option>
                            @foreach ($codes as $item)
                            @if ($item->category === 'Rank')
                            <option value="{{ $item->id }}">{{ $item->value}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="name" class="form-label text-primary mb-1">Name</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="name" 
                            name="name"
                            required
                        >
                    </div>
                </div>

                <div class="mb-3">
                    <label for="region" class="form-label text-primary mb-1">Region</label>
                    <select class="form-control" id="region" name="region" required>
                        <option disabled selected value>Select Region</option>
                        @foreach ($regions as $item)
                            <option value="{{ $item->id }}">{{ $item->region }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="office" class="form-label text-primary mb-1">Office</label>
                    <select class="form-control" id="office" name="office" required>
                        <option disabled selected value>Select Office</option>
                        <!-- Options for offices will be dynamically populated based on the selected region -->
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="username" class="form-label text-primary mb-1">Username</label>
                        <input 
                            type="username" 
                            class="form-control" 
                            id="username" 
                            name="username"
                            required
                            >
                    </div>
                    <div class="col">
                        <label for="password" class="form-label text-primary mb-1">Password</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password"
                            required
                            >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <label for="role" class="form-label text-primary mb-1">User Type</label>
                        <select class="form-control" id="role" name="role">
                            <option disabled selected value>Select Role</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Viewer">Viewer</option>
                        </select>
                    </div>
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

<script>
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

