<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('admin//dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin//dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <!-- Category start here -->
        <nav class="">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                    <li
                        class="nav-item  {{ Request::routeIs('department.create') || Request::routeIs('department.index') || Request::routeIs('department.edit') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Departments
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{route('department.create')}}"
                                    class="nav-link ">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Department Entry</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('department.index')}}"
                                    class="nav-link ">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>All Departments</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li
                        class="nav-item  {{ Request::routeIs('employee.create') || Request::routeIs('employee.index') || Request::routeIs('employee.edit') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Employees
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{route('employee.index')}}"
                                    class="nav-link ">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>All Employees</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('employee.create')}}"
                                    class="nav-link ">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Employee Entry</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                    class="nav-item {{ Request::routeIs('timeTable.create') || Request::routeIs('timeTable.index') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Time Schedule
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item">
                            <a href="{{route('timeTable.create')}}"
                                class="nav-link ">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Create Schedule </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('timeTable.index')}}"
                                class="nav-link ">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Schedule</p>
                            </a>
                        </li>
                    </ul>
                </li>

                    <li
                        class="nav-item  ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Time Sheet
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link ">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>In-Time</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link ">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Out-Time</p>
                                </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>