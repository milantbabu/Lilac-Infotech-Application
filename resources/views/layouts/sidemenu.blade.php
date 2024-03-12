@php
    $current_route = Request::route()->getName();
    // echo $current_route;
@endphp
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon">
            <img class="logoicon" src="{{ asset('assets/img/logo.png') }}">
        </div>
        <div class="sidebar-brand-logo">
            <img class="logoicon" src="{{ asset('assets/img/logo.png') }}">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider d-md-block">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{in_array($current_route, ['dashboard'])? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-home" data-toggle="tooltip" data-placement="right" title="Dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

        <li class="nav-item {{in_array($current_route, ['departments', 'designations', 'users'])? 'active' : ''}}">
          <a class="nav-link {{!in_array($current_route, ['departments', 'designations', 'users'])? 'collapsed' : ''}}"
               href="#" data-toggle="collapse" data-target="#collapseLead"
               aria-expanded="{{in_array($current_route,['departments', 'designations', 'users'])? 'true' : 'false'}}"
               aria-controls="collapseLead">
                <i class="fas fa-user" data-toggle="tooltip" data-placement="right" title="User Relationship Management"></i>
                <span>User</span>
            </a>
            <div id="collapseLead"
                 class="collapse {{in_array($current_route,['departments', 'designations', 'users'])? 'show' : ''}}"
                 aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner">

                  <h6 class="collapse-header">Manage User:</h6>

                      <a class="collapse-item {{in_array($current_route, ['departments'])? 'active' : ''}}"
                         href="{{ route('departments') }}">Departments 
                       </a>

                       <a class="collapse-item {{in_array($current_route, ['designations'])? 'active' : ''}}"
                          href="{{ route('designations') }}">Designations
                        </a>
                        <a class="collapse-item {{in_array($current_route, ['users'])? 'active' : ''}}"
                          href="{{ route('users') }}">Users
                        </a>
                </div>
            </div>
        </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


</ul>
<!-- End of Sidebar -->
