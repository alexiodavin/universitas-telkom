<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AyoBlajar</title>
    <link rel="shortcut icon" href="{{ asset('photo/logo2.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('photo/logo2.png') }}" type="image/x-icon">
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
            background-color: #ffa121;
            border-color: #ffa121;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #ffa121 ;
            color: #fff ;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #ffa121 ;
            color: #fff ;
        }

        .btn-primary {
            color: #fff;
            background-color: #ffa121;
            border-color: #ffa121;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #ffa121;
            border-color: #ffa121;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #ffa121;
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #ffa121;
            border-color: #ffa121;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #ffa121;
            border-color: #ffa121;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0 #ffa121;
        }
    </style>
</head>
<body class="hold-transition login-page" style="background-color: #4a1ea2">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('photo/logo.png') }}" style="width: 100%; max-width: 350px;">
            </a>
        </div>
        <div class="card" style="border-radius: 10px;">
            <div class="card-body login-card-body" style="border-radius: 10px;">
                <h2 class="login-box-msg">Daftar</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <label>Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                    @error('name')
                        <span style="color: red;">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                    <br>

                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span style="color: red;">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                    <br>
                    
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    @error('password')
                        <span style="color: red;">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                    <br>

                    <label>Password Konfirmasi</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Password Konfirmasi" required>
                    @error('password_confirmation')
                        <span style="color: red;">
                            <i>{{ $message }}</i>
                        </span>
                    @enderror
                    <br>
                    
                    <div class="row">                        
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block shadow">Registrasi</button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block shadow">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
</body>
</html>