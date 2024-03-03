@extends('admin.partials.layout-main')

{{-- @section('content-header')
@endsection --}}

@section('body')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">System Logs</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Module</th>
                            <th>Event</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Module</th>
                            <th>Event</th>
                            <th>Details</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($auditLogs as $auditLog)
                        <tr>
                            <td class="text-nowrap">{{ $auditLog->created_at->format('m/d/Y') }}</td>
                            <td class="text-nowrap">{{ $auditLog->created_at->format('h:i A') }}</td>
                            <td class="text-nowrap">
                                {{ $auditLog->user->username }}
                            </td>
                            <td class="text-nowrap">{{ $auditLog->user->role }}</td>
                            <td class="text-nowrap">{{ $auditLog->event }}</td>
                            <td class="text-nowrap">
                                @php
                                    // Mapping of model names to display names
                                    $modelDisplayNames = [
                                        'App\Models\Crime' => 'Crimes',
                                        'App\Models\User' => 'Users',
                                        'App\Models\Region' => 'Regions',
                                        'App\Models\Office' => 'Offices',
                                        'App\Models\Code' => 'System Codes',
                                        // Add more mappings as needed
                                    ];
                            
                                    // Get the display name for the model
                                    $modelName = $auditLog->model;
                                    $displayName = $modelDisplayNames[$modelName] ?? 'System'; // Default to 'System' if not found
                            
                                    // Display the display name
                                    echo $displayName;
                                @endphp
                            </td>
                            <td>
                                @if($auditLog->event === 'created')
                                    <div>
                                        <strong>New Value:</strong> 
                                        <div>
                                            @foreach(json_decode($auditLog->new_value, true) as $key => $value)
                                                @if($key !== 'created_at' && $key !== 'updated_at' && $key !== 'id')
                                                    @if($key === 'password')
                                                        Password: Encrypted<br>
                                                    @elseif($key === 'role')
                                                        User Type: {{ $value }}<br>
                                                    @elseif($key === 'is_user')
                                                        User Status: {{ $value == 1 ? 'Active' : 'Inactive' }}<br>
                                                    @elseif($key === 'bailable')
                                                        Bailable: {{ $value == 1 ? 'Yes' : 'No' }}<br>
                                                    @elseif($key === 'rank')
                                                        Rank: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                    @elseif($key === 'type')
                                                        Crime Type: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                    @elseif($key === 'group')
                                                        Crime Group: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                    @elseif($key === 'region')
                                                        @if(is_numeric($value) && $region = \App\Models\Region::find($value))
                                                            Region: {{ $region->region }}<br>
                                                        @else
                                                            Region: {{ $value }}<br>
                                                        @endif
                                                    @elseif($key === 'office')
                                                        @if(is_numeric($value) && $office = \App\Models\Office::find($value))
                                                            Office: {{ $office->abbrev }}<br>
                                                        @else
                                                            Office: {{ $value }}<br>
                                                        @endif
                                                    @else
                                                        {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}<br>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @elseif($auditLog->event === 'updated')
                                    <div>
                                        <strong>Old Value:</strong> 
                                        <div>
                                            @foreach(json_decode($auditLog->old_value, true) as $key => $oldValue)
                                                @if($key !== 'created_at' && $key !== 'updated_at' && $key !== 'id')
                                                    @php
                                                        $newValue = json_decode($auditLog->new_value, true)[$key] ?? null;
                                                    @endphp
                                                    @if($oldValue !== $newValue)
                                                        @if($key === 'password')
                                                            Password: Encrypted<br>
                                                        @elseif($key === 'role')
                                                            User Type: {{ $oldValue }}<br>
                                                        @elseif($key === 'is_user')
                                                            User Status: {{ $oldValue == 1 ? 'Active' : 'Inactive' }}<br>
                                                        @elseif($key === 'bailable')
                                                            Bailable: {{ $oldValue == 1 ? 'Yes' : 'No' }}<br>
                                                        @elseif($key === 'rank')
                                                            Rank: {{ \App\Models\Code::where('id', $oldValue)->value('value') }}<br>
                                                        @elseif($key === 'type')
                                                            Crime Type: {{ \App\Models\Code::where('id', $oldValue)->value('value') }}<br>
                                                        @elseif($key === 'group')
                                                            Crime Group: {{ \App\Models\Code::where('id', $oldValue)->value('value') }}<br>
                                                        @elseif($key === 'region')
                                                            @if(is_numeric($oldValue) && $region = \App\Models\Region::find($oldValue))
                                                                Region: {{ $region->region }}<br>
                                                            @else
                                                                Region: {{ $oldValue }}<br>
                                                            @endif
                                                        @elseif($key === 'office')
                                                            @if(is_numeric($oldValue) && $office = \App\Models\Office::find($oldValue))
                                                                Office: {{ $office->abbrev }}<br>
                                                            @else
                                                                Office: {{ $oldValue }}<br>
                                                            @endif
                                                        @else
                                                            {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $oldValue }}<br>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                        <div>
                                            <strong>New Value:</strong> 
                                            <div>
                                                @foreach(json_decode($auditLog->new_value, true) as $key => $value)
                                                    @if($key !== 'created_at' && $key !== 'updated_at' && $key !== 'id')
                                                        @if($key === 'password')
                                                            Password: Encrypted<br>
                                                        @elseif($key === 'role')
                                                            User Type: {{ $value }}<br>
                                                        @elseif($key === 'is_user')
                                                            User Status: {{ $value == 1 ? 'Active' : 'Inactive' }}<br>
                                                        @elseif($key === 'bailable')
                                                            Bailable: {{ $value == 1 ? 'Yes' : 'No' }}<br>
                                                        @elseif($key === 'rank')
                                                            Rank: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                        @elseif($key === 'type')
                                                            Crime Type: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                        @elseif($key === 'group')
                                                            Crime Group: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                        @elseif($key === 'region')
                                                            @if(is_numeric($value) && $region = \App\Models\Region::find($value))
                                                                Region: {{ $region->region }}<br>
                                                            @else
                                                                Region: {{ $value }}<br>
                                                            @endif
                                                        @elseif($key === 'office')
                                                            @if(is_numeric($value) && $office = \App\Models\Office::find($value))
                                                                Office: {{ $office->abbrev }}<br>
                                                            @else
                                                                Office: {{ $value }}<br>
                                                            @endif
                                                        @else
                                                            {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}<br>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @elseif($auditLog->event === 'deleted')
                                    <div>
                                        <strong>Deleted Value:</strong> 
                                        <div>
                                            @foreach(json_decode($auditLog->old_value, true) as $key => $value)
                                                @if($key !== 'created_at' && $key !== 'updated_at' && $key !== 'id')
                                                    @if($key === 'password')
                                                        Password: Encrypted<br>
                                                    @elseif($key === 'role')
                                                        User Type: {{ $value }}<br>
                                                    @elseif($key === 'is_user')
                                                        User Status: {{ $value == 1 ? 'Active' : 'Inactive' }}<br>
                                                    @elseif($key === 'bailable')
                                                        Bailable: {{ $value == 1 ? 'Yes' : 'No' }}<br>
                                                    @elseif($key === 'rank')
                                                        Rank: {{ \App\Models\Code::where('id', $value)->value('value') }}<br>
                                                    @elseif($key === 'region')
                                                        @if(is_numeric($value) && $region = \App\Models\Region::find($value))
                                                            Region: {{ $region->region }}<br>
                                                        @else
                                                            Region: {{ $value }}<br>
                                                        @endif
                                                    @elseif($key === 'office')
                                                        @if(is_numeric($value) && $office = \App\Models\Office::find($value))
                                                            Office: {{ $office->abbrev }}<br>
                                                        @else
                                                            Office: {{ $value }}<br>
                                                        @endif
                                                    @else
                                                        {{ ucfirst(str_replace('_', ' ', $key)) }}: {{ $value }}<br>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </td>
                            
                                                                         
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



@endsection
