<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Telkom University - Pengelolaan Data Proyek Akhir</title>
    <link rel="shortcut icon" href="{{ asset('photo/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('photo/logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .nav-header {
            color: white !important;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #343434 !important;
            border-color: #343434 !important;
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #343434;
            color: white;
        }

        [class*=sidebar-dark-] .sidebar a {
            color: white;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
            color: white;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active,
        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus,
        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #343434 !important;
            color: #fff;
        }

        .btn-primary {
            color: #fff;
            background-color: #343434 !important;
            border-color: #343434 !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #343434 !important;
            border-color: #343434 !important;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #343434 !important;
        }

        .btn-primary.disabled,
        .btn-primary:disabled {
            color: #fff;
            background-color: #343434 !important;
            border-color: #343434 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:not(:disabled):not(.disabled).active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #343434 !important;
            border-color: #343434 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus,
        .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0 #343434 !important;
            background-color: #343434 !important;
        }

        .borderless td,
        .borderless th {
            border: none;
        }

        .new-shadow {
            transition: box-shadow .3s;
            /* Animation */
        }

        .new-shadow:hover {
            box-shadow: 0 0 10px rgba(33, 33, 33, .6);
        }

        [class*=sidebar-dark] .user-panel {
            border-bottom: none;
        }

        [class*=sidebar-dark] .brand-link {
            border-bottom: none;
        }

        .bg-primary {
            background-color: #343434 !important;
        }

        .bg-primary:hover {
            background-color: #343434 !important;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
            background-color: #343434 !important;
        }

        .bg-primary:active {
            background-color: #343434 !important;
        }

        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #343434;
            background-color: #343434;
            box-shadow: none;
        }

        select:focus,
        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        .uneditable-input:focus {
            border-color: #b6252a !important;
            box-shadow: 0 0 1px #b6252a inset, 0 0 3px #b6252a !important;
            outline: 0 none;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #b6252a;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('backend.logout') }}"><i
                            class="nav-icon fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #b6252a;">
            <a href="{{ route('backend.dashboard') }}">
                <img src="{{ asset('photo/logo2.png') }}" style="width: 100%;">
            </a>
            @include('layouts.backend.sidebar')
        </aside>

        @yield('content')
        <footer class="main-footer" style="background-color: #b6252a; color: white;">
            <center>
                Telkom University<br>
                Pengelolaan Data Proyek Akhir
            </center>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $(function() {
            $("#example1").DataTable();

        });
    </script>

    @if (session('success'))
        <script>
            swal.fire({
                title: 'Sukses!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#b6252a',
            })
        </script>
    @endif

    @if (session('failed'))
        <script>
            swal.fire({
                title: 'Gagal!',
                text: "{{ session('failed') }}",
                icon: 'error',
                confirmButtonColor: '#b6252a',
            })
        </script>
    @endif
    @if ($errors->any())
        <script>
            swal.fire({
                title: 'Terjadi kesalahan!',
                text: "@foreach ($errors->all() as $error) {{ $error . ', ' }} @endforeach ",
                icon: 'error',
                confirmButtonColor: '#b6252a',
            })
        </script>
    @endif

    @if (session('warning'))
        <script>
            swal.fire({
                title: 'Peringatan!',
                text: "{{ session('warning') }}",
                icon: 'warning',
                confirmButtonColor: '#b6252a',
            })
        </script>
    @endif

    <script src="{{ asset('plugins/dropify/dist/js/dropify.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove': 'Remove',
                'error': 'Aduhh, terjadi kesalahan.'
            }
        });
    </script>

    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @yield('js')
</body>

</html>
