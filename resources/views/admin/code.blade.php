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
    <h1 class="h5 mb-4 text-gray-800">System Codes</h1>

    <!-- Add Button -->
    <a href="#" class="btn btn-primary btn-icon-split m-0 mb-3" data-toggle="modal" data-target="#codeCreateModal">
        <span class="icon text-white-50">
            <i class="fa-solid fa-plus pt-1"></i>
        </span>
        <span class="text">Add System Code</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Value</th>
                            <th>Description</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Category</th>
                            <th>Value</th>
                            <th>Description</th>
                            <th class="fit">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($codes as $code)
                        <tr>
                            <td>{{ $code->category }}</td>
                            <td>{{ $code->value }}</td>
                            <td>{{ $code->description }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#codeUpdateModal{{ $code->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                        @include('admin.modals.code_update')   
                                    <form id="delete-form-{{ $code->id }}" action="{{ route('code.destroy', $code->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="confirmDelete('{{ $code->id }}')">
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

    @include('admin.modals.code_create')

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
