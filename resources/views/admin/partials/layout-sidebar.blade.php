@php
$current_route=request()->route()->getName();
@endphp

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="">
            <img src="{{ asset('assets\img\ci_logo.png') }}" width="30" alt="bjmpci logo">
        </div>
        <div class="sidebar-brand-text text-lg pl-2"><span>CRIME</span><span>INDEX</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Crimes -->
    <li class="nav-item {{ $current_route=='crime'?'active':'' }}">
        <a class="nav-link" href="{{ route('crime') }}">
            <i class="fas fa-fw fa-handcuffs"></i>
            <span>Crimes</span>
        </a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ $current_route=='user'?'active':'' }}">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Pages Libraries Menu -->
    <li class="nav-item {{ $current_route == 'region' || $current_route == 'office' || $current_route == 'code' ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>Library</span>
        </a>
        <div id="collapseTwo" class="collapse {{ $current_route == 'region' || $current_route == 'office' || $current_route == 'code' ? 'show' : 'collapse' }}" 
        aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item mb-1 {{ $current_route=='region'?'active':'' }}" href="{{ route('region') }}">Regions</a>
                <a class="collapse-item mb-1 {{ $current_route=='office'?'active':'' }}" href="{{ route('office') }}">Offices</a>
                <a class="collapse-item {{ $current_route=='code'?'active':'' }}" href="{{ route('code') }}">System Codes</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - System Logs -->
    <li class="nav-item">
        <a class="nav-link logs disabled" href="#">
            <i class="fas fa-fw fa-file-lines"></i>
            <span>System Logs</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->