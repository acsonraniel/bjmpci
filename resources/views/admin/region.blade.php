@extends('admin.partials.layout-main')

{{-- @section('content-header')
@endsection --}}

@section('body')

<div class="container-fluid">

    @if(session('flash_message'))
    <div class="alert alert-success show position-absolute right-0 mr-4" style="font-size: 0.9em; right:0;" id="flash-message" role="alert">
        {{ session('flash_message') }}
    </div>
    @endif

    <script>
        // Automatically close the flash message after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 3000);
    </script>

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
                            <th class="fit">Landline</th>
                            <th class="fit">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Region Name</th>
                            <th>Director</th>
                            <th>Regional Office Address</th>
                            <th class="fit">Landline</th>
                            <th class="fit">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>       
                        @foreach ($regions as $item)
                        <tr>
                            <td>{{ $item->region }}</td>
                            <td>
                                @php
                                    $code = \App\Models\Code::find($item->rank);
                                    echo $code ? $code->value : 'Unknown Rank';
                                @endphp

                                {{ $item->name }}
                            </td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->landline }}</td>
                            <td class="py-2">
                                <a class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#regionUpdateModal">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a class="btn btn-danger btn-circle btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.modals.region_create')
    @include('admin.modals.region_update')
    
</div>

@endsection
