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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #b6252a !important;
            border-color: #b6252a !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: white;
            color: #b6252a ;
        }
        [class*=sidebar-dark-] .sidebar a {
            color: white;
        }
        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
            color: white;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #b6252a !important ;
            color: #fff ;
        }

        .btn-primary {
            color: #fff;
            background-color: #b6252a !important;
            border-color: #b6252a !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #b6252a !important;
            border-color: #b6252a !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #b6252a !important;
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #b6252a !important;
            border-color: #b6252a !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #b6252a !important;
            border-color: #b6252a !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0 #b6252a !important;
            background-color: #b6252a !important;
        }

        .borderless td, .borderless th {
            border: none;
        }

        .new-shadow{
            transition: box-shadow .3s; /* Animation */
        }

        .new-shadow:hover{
            box-shadow: 0 0 10px rgba(33,33,33,.6);
        }

        [class*=sidebar-dark] .user-panel {
            border-bottom: none;
        }

        [class*=sidebar-dark] .brand-link {
            border-bottom: none;
        }

        .bg-primary {
            background-color: #b6252a !important;
        }

        .bg-primary:hover {
            background-color: #b6252a !important;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
            background-color: #b6252a !important;
        }

        .bg-primary:active {
            background-color: #b6252a !important;
        }

        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #b6252a;
            background-color: #b6252a;
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
        body {
            background-image: url('{{ asset('photo/bg-login.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            color: white;
            font-family: arial;
        }
    </style>
</head>
<body>
    <center>
        <div class="login-box" style="margin-top: 150px;">
            <div class="login-logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('photo/logo.png') }}" style="width: 100%; max-width: 200px;">
                </a>
            </div>
            <div class="card shadow" style="border-radius: 10px;">
                <center>
                    <br>
                    <h1 style="color: black;">Pemulihan Akun</h1>
                </center>
                <div class="card-body login-card-body" style="border-radius: 10px;">
                    <form action="{{ route('frontend.forgot-password.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3 shadow">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block shadow mb-3">Submit</button>
                                <center>
                                    <a style="color: red;" href="{{ route('login') }}">Login</a>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="pt-4 pb-4" style="background-color: #b6252a">
        <center>
            <h5>
                Telkom University<br>
                Pengelolaan Data Proyek Akhir
            </h5>
        </center>
    </div>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @if(session('success'))
        <script>
            swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#b6252a',
            })
        </script>
    @endif
    @if(session('warning'))
        <script>
            swal.fire({
                title: 'Warning!',
                text: "{{ session('warning') }}",
                icon: 'warning',
                confirmButtonColor: '#b6252a',
            })
        </script>
    @endif
</body>
</html>
