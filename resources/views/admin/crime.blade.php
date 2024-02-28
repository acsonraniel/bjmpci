@extends('admin.partials.layout-main')

{{-- @section('content-header')
@endsection --}}

@section('body')

<div class="container-fluid">

    @if(session('error'))
    <script>
        // Defer the execution of the alert until after the page has loaded
        window.addEventListener('DOMContentLoaded', function() {
            // Display an alert box for success
            alert('{{ session('error') }}');
        });
    </script>
    @endif
    
    
    @if(session('success'))
    <script>
        // Defer the execution of the alert until after the page has loaded
        window.addEventListener('DOMContentLoaded', function() {
            // Display an alert box for success
            alert('{{ session('success') }}');
        });
    </script>
    @endif

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">Crimes</h1>

    <!-- Add Button -->
    <a href="#" class="btn btn-primary btn-icon-split float-end m-0 mb-3" data-toggle="modal" data-target="#crimeCreateModal">
        <span class="icon text-white-50">
            <i class="fa-solid fa-plus pt-1"></i>
        </span>
        <span class="text">Add Crime</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Group</th>
                            <th>Crime</th>
                            <th>Min Sentence</th>
                            <th>Max Sentence</th>
                            <th class="fit">Bailable</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Type</th>
                            <th>Group</th>
                            <th>Crime</th>
                            <th>Min Sentence</th>
                            <th>Max Sentence</th>
                            <th>Bailable</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($crimes as $crime)
                        <tr>
                            <td>
                                @php
                                    $code = \App\Models\Code::find($crime->type);
                                    echo $code ? $code->value : 'N/A';
                                @endphp
                            </td>
                            <td>
                                @php
                                    $code = \App\Models\Code::find($crime->group);
                                    echo $code ? $code->value : 'N/A';
                                @endphp
                            </td>
                            <td>{{ $crime->crime}}</td>
                            <td>
                                {{ $crime->min_year}}<small class="text-muted"> Year/s</small>
                                {{ $crime->min_month}}<small class="text-muted"> Month/s</small>
                                {{ $crime->min_day}}<small class="text-muted"> Day/s</small>
                            </td>
                            <td>
                                {{ $crime->max_year}}<small class="text-muted"> Year/s</small>
                                {{ $crime->max_month}}<small class="text-muted"> Month/s</small>
                                {{ $crime->max_day}}<small class="text-muted"> Day/s</small>
                            </td>
                            <td>{{ $crime->bailable == '1' ? 'Yes' : 'No' }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center {{ auth()->user()->role === 'Viewer' ? 'invisible' : '' }}">
                                    <a class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#crimeUpdateModal{{ $crime->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @include('admin.modals.crime_update')
                                    <form id="delete-form-{{ $crime->id }}" action="{{ route('crime.destroy', $crime->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="confirmDelete('{{ $crime->id }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.modals.crime_create')

</div>

    {{-- script for delete button --}}
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this code?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

@endsection
