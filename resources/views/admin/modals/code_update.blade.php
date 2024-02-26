<div class="modal fade" id="codeUpdateModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add System Code</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>

            <form id="codeUpdateForm{{ $item->id }}" action="{{ url('code') }}/{{ $item->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="mb-3">
                        <label for="category" class="form-label text-primary mb-1">Category</label>
                        <select class="form-control" id="updateCategory" name="category">
                            <option disabled value="">Select Category</option>
                            <option value="Rank" {{ $item->category == 'Rank' ? 'selected' : '' }}>Rank</option>
                            <option value="Crime Group" {{ $item->category == 'Crime Group' ? 'selected' : '' }}>Crime Group</option>
                            <option value="Crime Type" {{ $item->category == 'Crime Type' ? 'selected' : '' }}>Crime Type</option>
                        </select>
                        <div id="categoryUpdateError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label text-primary mb-1">Value</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateValue" 
                            name="value"
                            value="{{ $item->value }}"
                        >
                        <div id="valueUpdateError" class="text-danger pl-2 pt-2"></div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-primary mb-1">Description</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="updateDescription" 
                            name="description"
                            value="{{ $item->description }}"
                        >
                    </div>
                </div>
                
                <div class="modal-footer pb-0 mb-3">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button id="updateBtn" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
function submitForm(event, id) {
    event.preventDefault(); // Prevent default form submission
    
    // Construct form data
    var formData = new FormData(document.getElementById('codeUpdateForm' + id));

    // Send an asynchronous request to submit the form data
    fetch("{{ url('code') }}/" + id, {
        method: 'PUT',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // If submission is successful, display an alert box
        alert('System Code updated successfully!');
        
        // Optionally, you can close the modal or redirect the user to another page
        $('#codeUpdateModal' + id).modal('hide');
        // window.location.href = "{{ url('code') }}";
    })
    .catch(error => {
        // Handle errors
        console.error('Error:', error);
    });
}


</script>




