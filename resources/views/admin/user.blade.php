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
    <h1 class="h5 mb-4 text-gray-800">Users</h1>

    <!-- Add Button -->
    <a href="#" class="btn btn-primary btn-icon-split float-end m-0 mb-3" data-toggle="modal" data-target="#userCreateModal">
        <span class="icon text-white-50">
            <i class="fa-solid fa-plus pt-1"></i>
        </span>
        <span class="text">Add User</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User Type</th>
                            <th class="fit">User Status</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Office</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User Type</th>
                            <th>User Stauts</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $item )
                        <tr>
                            <td>{{ $item->role }}</td>
                            <td class="{{ $item->is_user === 1 ? 'text-success' : 'text-danger' }}">
                                {{ $item->is_user === 1 ? 'Active' : 'Inactive' }}
                            </td>
                            <td>{{ $item->username }}</td>
                            <td>
                                @php
                                $code = \App\Models\Code::find($item->rank);
                                echo $code ? $code->value : '';
                                @endphp

                                {{ $item->name }}</td>
                            <td>
                            @php
                                $region = \App\Models\Region::find($item->region);
                                echo $region ? $region->region : 'Unknown Region';
                             @endphp
                            </td>
                            <td>
                            @php
                                $office = \App\Models\Office::find($item->office);
                                echo $office ? $office->abbrev : 'Unknown Office';
                             @endphp
                            </td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#userUpdateModal{{ $item->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @include('admin.modals.user_update')
                                    {{-- <form id="delete-form-{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="confirmDelete('{{ $item->id }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @include('admin.modals.user_create')

</div>

@endsection
