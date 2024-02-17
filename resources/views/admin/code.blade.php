@extends('admin.partials.layout-main')

{{-- @section('content-header')
@endsection --}}

@section('body')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">System Codes</h1>

    <!-- Add Button -->
    <a href="#" class="btn btn-primary btn-icon-split float-end m-0 mb-3" data-toggle="modal" data-target="#codeModal">
        <span class="icon text-white-50">
            <i class="fa-solid fa-plus pt-1"></i>
        </span>
        <span class="text">Add System Code</span>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Value</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Category</th>
                            <th>Value</th>
                            <th class="fit">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
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

    <div class="modal fade" id="codeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Region</h5>
                    <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                </div>

                <form action="" method="post">
                <div class="modal-body px-4 py-3" style="font-size: 0.9em;">

                    <div class="mb-3">
                        <label for="category" class="form-label text-primary mb-1">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="group"></option>
                            <option value="type"></option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label text-primary mb-1">Value</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="value" 
                            name="value"
                        >
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
