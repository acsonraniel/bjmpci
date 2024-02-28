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
                        @foreach ($users as $user )
                        <tr>
                            <td>{{ $user->role }}</td>
                            <td class="{{ $user->is_user === 1 ? 'text-success' : 'text-danger' }}">
                                {{ $user->is_user === 1 ? 'Active' : 'Inactive' }}
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @php
                                $code = \App\Models\Code::find($user->rank);
                                echo $code ? $code->value : '';
                                @endphp

                                {{ $user->name }}</td>
                            <td>
                            @php
                                $region = \App\Models\Region::find($user->region);
                                echo $region ? $region->region : 'Unknown Region';
                             @endphp
                            </td>
                            <td>
                            @php
                                $office = \App\Models\Office::find($user->office);
                                echo $office ? $office->abbrev : 'Unknown Office';
                             @endphp
                            </td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info btn-circle btn-sm mr-2" data-toggle="modal" data-target="#userUpdateModal{{ $user->id }}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    @include('admin.modals.user_update')
                                    {{-- <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="confirmDelete('{{ $user->id }}')">
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
