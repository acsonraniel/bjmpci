@extends('admin.partials.layout-main')

{{-- @section('content-header')
@endsection --}}

@section('body')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">Users</h1>

    <!-- Add Button -->
    <a href="#" class="btn btn-primary btn-icon-split float-end m-0 mb-3" data-toggle="modal" data-target="#userModal">
        <span class="icon text-white-50">
            <i class="fa-solid fa-plus pt-1"></i>
        </span>
        <span class="text">Add User</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="fit">User Type</th>
                            <th class="fit">Username</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Office</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User Type</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="py-2">
                                <a class="btn btn-info btn-circle btn-sm">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- User Modal-->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> User</h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                </div>

                <form action="" method="post">
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">
                
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="rank" class="form-label text-primary mb-1">Rank</label>
                            <select class="form-control" id="rank" name="rank">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="name" class="form-label text-primary mb-1">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="mb-3">
                            <label for="region" class="form-label text-primary mb-1">Region</label>
                            <select class="form-control" id="region" name="region">
                                <option value=""></option>
                            </select>
                    </div>

                    <div class="mb-3">
                            <label for="office" class="form-label text-primary mb-1">Office</label>
                            <select class="form-control" id="office" name="office">
                                <option value=""></option>
                            </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="username" class="form-label text-primary mb-1">Username</label>
                            <input type="username" class="form-control" id="username" name="username">
                        </div>
                        <div class="col">
                            <label for="password" class="form-label text-primary mb-1">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="role" class="form-label text-primary mb-1">User Type</label>
                            <select class="form-control" id="role" name="role">
                                <option value="admin">Administrator</option>
                                <option value="viewer">Viewer</option>
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

</div>

@endsection
