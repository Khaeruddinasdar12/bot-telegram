<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
    href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript" src="{{'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'}}"></script>

    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    @yield('firebase')
    <style type="text/css">
    body {
        overflow-x: hidden !important;
    }
  
      .loader {
          border: 8px solid #f3f3f3; /* Light grey */
          border-top: 8px solid #3498db; /* Blue */
          border-radius: 50%;
          width: 60px;
          height: 60px;
          z-index: 100;

          position: fixed;
          left: 0;
          top: 0;
          right: 0;
          bottom: 0;
          margin: auto; 
          animation: spin 1.5s linear infinite;
      }

      @keyframes  spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
      }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="loader" style="display:none"></div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="right fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="{{ route('profile.admin') }}">
                    <i class="right fas fa-user"></i> Profile
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('asset/image/png-logo.png') }}" alt="AdminLTE Logo"
        class="brand-image image-sidebar">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image image-s">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item has-treeview">
                <a href="{{route('dashboard')}}"
                class="nav-link {{ request()->is('/') || request()->is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
                <a href="{{ route('chatbox') }}"
                class="nav-link {{ request()->is('chatbox') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    Chatbox
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('data.customer') }}" class="nav-link {{ request()->is('data-customer') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Data Customer
                </p>
            </a>
        </li>
        
        <li class="nav-item {{ request()->is('pengerjaan') || request()->is('riwayat-pengerjaan') ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('pengerjaan') || request()->is('riwayat-pengerjaan') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Pengerjaan
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('pengerjaan')}}" class="nav-link  {{ request()->is('pengerjaan') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sedang Berlangsung</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('riwayat.pengerjaan')}}" class="nav-link  {{ request()->is('riwayat-pengerjaan') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat Pengerjaan</p>
                    </a>
                </li>
                </ul>
            </li>
        
        <li class="nav-item">
            <a href="{{route('manage.admin')}}" class="nav-link {{ request()->is('manage-admin') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                    Manage Admin
                </p>
            </a>
        </li>

</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Manajemen BOT Telegram</a>.</strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

@yield('js')
<script type="text/javascript">
    function hapus() {
        $(document).on('click', "#del_data", function () {
            Swal.fire({
                title: 'Anda Yakin ?',
                text: "Anda tidak dapat mengembalikan data yang telah di hapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lanjutkan Hapus!',
                timer: 6500
            }).then((result) => {
                if (result.value) {
                    var me = $(this),
                    url = me.attr('href'),
                    token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': token
                        },
                        success: function (data) {
                            berhasil(data.status, data.pesan);
                        },
                        error: function (xhr, status, error) {
                            var error = xhr.responseJSON;
                            if ($.isEmptyObject(error) == false) {
                                $.each(error.errors, function (key, value) {
                                    gagal(key, value);
                                });
                            }
                        }
                    });
                }
            });
        });
    }

    function status(pesan) {
        $(document).on('click', "#status_perjalanan", function () {
            Swal.fire({
                title: 'Anda Yakin ?',
                text: pesan,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Lanjutkan!',
                timer: 6500
            }).then((result) => {
                if (result.value) {
                    var me = $(this),
                    url = me.attr('href'),
                    token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            '_method': 'PUT',
                            '_token': token
                        },
                        success: function (data) {
                            berhasil(data.status, data.pesan);
                        },
                        error: function (xhr, status, error) {
                            var error = xhr.responseJSON;
                            if ($.isEmptyObject(error) == false) {
                                $.each(error.errors, function (key, value) {
                                    gagal(key, value);
                                });
                            }
                        }
                    });
                }
            });
        });
    }

    function berhasil(status, pesan) {
        if (status == 'success') {
            Swal.fire({
                type: status,
                title: pesan,
                showConfirmButton: true,
                button: "Ok"
            }).then(function () {
                location.reload();
            })
        } else {
            Swal.fire({
                type: status,
                title: pesan,
                showConfirmButton: true,
                button: "Ok"
            })
        }
    }
    
    function good(status, pesan) {
            Swal.fire({
                type: status,
                title: pesan,
                showConfirmButton: true,
                button: "Ok"
            })
    }

    function gagal(key, pesan) {
        Swal.fire({
            type: 'error',
            title: key + ' : ' + pesan,
            showConfirmButton: true,
            button: "Ok"
        })
    }

</script>
</body>

<style>
    .image-s i {
        font-size: 30px !important;
        color: #ffff;
    }

</style>

</html>
