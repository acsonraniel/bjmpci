<div class="modal fade" id="crimeUpdateModal{{ $crime->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Crime</h5>
                <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> -->
            </div>
            <form id="crimeUpdateForm{{ $crime->id }}" action="{{ url('crime') }}/{{ $crime->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="type{{ $crime->id }}" class="form-label text-primary mb-1">Crime Type</label>
                            <select type="text" class="form-control" id="type{{ $crime->id }}" name="type">
                                <option selected {{ is_null($crime->type) ? 'selected' : '' }}>Not Applicable</option>
                                @foreach ($codes as $code)
                                @if ($code->category === 'Crime Type')
                                <option value="{{ $code->id }}" {{ $code->id == $crime->type ? 'selected' : '' }}>
                                    {{ $code->value}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="group{{ $crime->id }}" class="form-label text-primary mb-1">Crime Group</label>
                            <select type="text" class="form-control" id="group{{ $crime->id }}" name="group">
                                <option selected {{ is_null($crime->type) ? 'selected' : '' }}>Not Applicable</option>
                                @foreach ($codes as $code)
                                @if ($code->category === 'Crime Group')
                                <option value="{{ $code->id }}" {{ $code->id == $crime->group ? 'selected' : '' }}>
                                    {{ $code->value}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="crime{{ $crime->id }}" class="form-label text-primary mb-1">Crime</label>
                        <textarea 
                            class="form-control"
                            style="resize: none;"
                            rows="3"
                            id="crime{{ $crime->id }}" 
                            name="crime"
                        >{{ $crime->crime }}</textarea>
                    </div>

                    <label class="form-label text-primary mb-1">Minimum Sentence</label>
                    <div class="row mb-3" style="font-size: 0.9em;">
                        <div class="col">
                            <label for="minYear{{ $crime->id }}" class="form-label mb-1">Years</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="MinYear{{ $crime->id }}"
                                name="min_year"
                                required
                                value="{{ $crime->min_year }}"
                            >
                        </div>
                        <div class="col">
                            <label for="minMonth{{ $crime->id }}" class="form-label mb-1">Months</label>
                            <input 
                                type="number"
                                class="form-control" 
                                id="minMonth{{ $crime->id }}"
                                name="min_month"
                                max="11"
                                required
                                value="{{ $crime->min_month }}"
                            >
                        </div>
                        <div class="col">
                            <label for="minDay{{ $crime->id }}" class="form-label mb-1">Days</label>
                            <input
                                type="number" 
                                class="form-control" 
                                id="minDay{{ $crime->id }}"
                                name="min_day"
                                max="30"
                                required
                                value="{{ $crime->min_day }}"
                            >
                        </div>
                    </div>

                    <label class="form-label text-primary mb-1">Maximum Sentence</label>
                    <div class="row mb-3" style="font-size: 0.9em;">
                        <div class="col">
                            <label for="maxYear{{ $crime->id }}" class="form-label mb-1">Years</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="maxYear{{ $crime->id }}"
                                name="max_year"
                                required
                                value="{{ $crime->max_year }}"
                            >
                        </div>
                        <div class="col">
                            <label for="maxMonth{{ $crime->id }}" class="form-label mb-1">Months</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="maxMonth{{ $crime->id }}"
                                name="max_month"
                                max="11"
                                required
                                value="{{ $crime->max_month }}"
                            >
                        </div>
                        <div class="col">
                            <label for="maxDay{{ $crime->id }}" class="form-label mb-1">Days</label>
                            <input
                                type="number" 
                                class="form-control" 
                                id="maxDay{{ $crime->id }}"
                                name="max_day"
                                max="30"
                                required
                                value="{{ $crime->max_day }}"
                            >
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="bailable{{ $crime->id }}" class="form-label text-primary mb-1">Bailable</label>
                            <select class="form-control" id="bailable{{ $crime->id }}" name="bailable">
                                <option value="1" {{ $crime->bailable == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $crime->bailable == '0' ? 'selected' : '' }}>No</option>
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
    function submitForm(event, id) {
        event.preventDefault(); // Prevent default form submission
        
        // Construct form data
        var formData = new FormData(document.getElementById('crimeUpdateForm' + id));
    
        // Send an asynchronous request to submit the form data
        fetch("{{ url('crime') }}/" + id, {
            method: 'PUT',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // If submission is successful, display an alert box
            alert('Crime updated successfully!');
            
            // Optionally, you can close the modal or redirect the user to another page
            $('#crimeUpdateModal' + id).modal('hide');
            // window.location.href = "{{ url('code') }}";
        })
        .catch(error => {
            // Handle errors
            console.error('Error:', error);
        });
    }    
</script>