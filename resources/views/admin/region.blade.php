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
    <h1 class="h5 mb-4 text-gray-800">Regions</h1>

    <!-- Add Button -->
    <a href="#" class="btn btn-primary btn-icon-split float-end m-0 mb-3" data-toggle="modal" data-target="#regionCreateModal">
        <span class="icon text-white-50">
            <i class="fa-solid fa-plus pt-1"></i>
        </span>
        <span class="text">Add Region</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Region Name</th>
                            <th>Director</th>
                            <th>Regional Office Address</th>
                            <th>Landline</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Region Name</th>
                            <th>Director</th>
                            <th>Regional Office Address</th>
                            <th>Landline</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>       
                        @foreach ($regions as $region)
                        <tr>
                            <td>{{ $region->region }}</td>
                            <td>
                                @php
                                    $code = \App\Models\Code::find($region->rank);
                                    echo $code ? $code->value : '';
                                @endphp

                                {{ $region->name }}
                            </td>
                            <td>{{ $region->address }}</td>
                            <td>{{ $region->landline }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#regionUpdateModal{{ $region->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @include('admin.modals.region_update') 
                                    <form id="delete-form-{{ $region->id }}" action="{{ route('region.destroy', $region->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="confirmDelete('{{ $region->id }}')">
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

    @include('admin.modals.region_create')

    {{-- script for delete button --}}
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this code?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
    
</div>

@endsection
