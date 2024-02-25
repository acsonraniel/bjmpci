@extends('admin.partials.layout-main')

{{-- @section('content-header')
@endsection --}}

@section('body')

<div class="container-fluid">
    
    @if(session('error'))
    <div class="alert alert-danger show position-absolute right-0 mr-4" style="font-size: 0.9em; right:0;" id="flash-message" role="alert">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('success'))
    <div class="alert alert-success show position-absolute right-0 mr-4" style="font-size: 0.9em; right:0;" id="flash-message" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <script>
        // JavaScript to automatically close the flash message after 3 seconds
        window.addEventListener('DOMContentLoaded', function() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                setTimeout(function() {
                    flashMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>
    

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
                        @foreach ($codes as $item)
                        <tr>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->value }}</td>
                            <td>{{ $item->description }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#codeUpdateModal">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('code.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="confirmDelete('{{ $item->id }}')">
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
    @include('admin.modals.code_update')

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this code?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>

</div>

@endsection
