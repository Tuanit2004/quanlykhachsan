    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto" style="margin-right: 50px;">
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span> {{ Auth::user()->name }}</span>
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Thông tin người dùng</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">Thoát</a>
                    </div>
                </li>
            @endif

        </ul>
    </nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.index') }}" class="brand-link">
            <img src="{{ asset('font-end/css/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">TRANG QUẢN TRỊ</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('font-end/css/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                @if (Auth::check())
                    <div class="info">
                        <a href="{{ route('admin.profile', ['id' => Auth::user()->id]) }}"
                            class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                @endif
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.chitietdp.danhsach') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Danh Sách Khách Đặt Phòng
                            </p>
                        </a>
                    </li>

                    @if ((Auth::check() && Auth::user()->role_id == 1) || Auth::user()->role_id == 2)
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.loaiphong.danhsach') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Loại Phòng</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.loaiphong.danhsach') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách các Loại phòng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.loaiphong.getThem') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm/Cập nhật lại Loại Phòng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if ((Auth::check() && Auth::user()->role_id == 1) || Auth::user()->role_id == 2)
                        <li class="nav-item has-treeview">
                            <a href="{{ route('admin.phong.danhsach') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Phòng</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.phong.danhsach') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách các Phòng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.phong.getThem') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm/Cập nhập lại Phòng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a href="{{ route('admin.slide.danhsach') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Danh Sách Slide
                                </p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.slide.danhsach') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách Slide</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.slide.getThem') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm Slide</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a href="{{ route('admin.user.danhsach') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    User
                                </p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.danhsach') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.getThem') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

    </aside>
