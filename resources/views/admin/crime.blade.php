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
                            <th class="fit">Type</th>
                            <th class="fit">Group</th>
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
                        @foreach ($crimes as $item)
                        <tr>
                            <td>
                                @php
                                    $code = \App\Models\Code::find($item->type);
                                    echo $code ? $code->value : '';
                                @endphp
                            </td>
                            <td>{{ $item->group }}</td>
                            <td>{{ $item->crime }}</td>
                            <td>
                                {{ $item->minYear ?? '0' }}<small class="text-muted"> Year/s</small>
                                {{ $item->minMonth ?? '0' }}<small class="text-muted"> Month/s</small>
                                {{ $item->minDay ?? '0' }}<small class="text-muted"> Day/s</small>
                            </td>
                            <td>
                                {{ $item->maxYear ?? '0' }}<small class="text-muted"> Year/s</small>
                                {{ $item->maxMonth ?? '0' }}<small class="text-muted"> Month/s</small>
                                {{ $item->maxDay ?? '0' }}<small class="text-muted"> Day/s</small>
                            </td>
                            <td>{{ $item->bailable == '1' ? 'Yes' : 'No' }}</td>
                            <td class="py-2">
                                <a class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#crimeUpdateModal">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
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

    @include('admin.modals.crime_create')
    @include('admin.modals.crime_update')

</div>

@endsection
