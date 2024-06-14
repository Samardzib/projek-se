<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>@yield('app-title', 'Login')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Phoenixcoded">
    @vite('resources/js/app.js')

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{  asset('asset-icon/LogoIlearn.png') }}" type="image/x-icon">
    <!-- [Font] Family -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/inter/inter.css" id="main-font-link" />

    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style-preset.css" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f5f7;
        }

        .auth-main {
            display: flex;
            width: 100%;
            /* max-width: 1200px; */
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .auth-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            position: relative;
            padding: 40px;
        }
        .auth-image img {
            width: 80%;
            max-width: 400px;
            z-index: 2;
        }
        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        .auth-image .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 2;
        }
        .auth-image .logo img {
            width: 120px;
        }
        .auth-image .circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background-color: #e05d44;
            border-radius: 50%;
            z-index: 0;
        }
        .auth-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background-color: #e05d44;
        }
        .auth-form {
            width: 100%;
            max-width: 400px;
            background-color: #e05d44;
        }
        .card {
            width: 100%;
            border: none;
            box-shadow: none;
        }
        .card-body {
            padding: 20px;
        }
        .btn-primary {
            background-color: #e05d44;
            border-color: #e05d44;
        }
        .btn-primary:hover {
            background-color: #c04a3b;
            border-color: #c04a3b;
        }
    </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <div class="auth-main">
        <div class="auth-image">
            <div class="logo">
                <img src="{{  asset('asset-icon/LogoIlearn.png') }}" alt="Logo">
            </div>
            <div class="circle"></div>
            <img src="{{  asset('asset-icon/LogoLogIn.png') }}" alt="Illustration">
        </div>
        <div class="auth-wrapper v1">
            <div class="auth-form1">
                <div class="card my-5">
                    <div class="card-body">
                        <h4 class="text-center f-w-500 mb-3">Login</h4>
                        <p class="text-center mb-4">Welcome back! Please log in to access your account.</p>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Email / Password</strong> is not registered.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Enter your Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your Password">
                                    <span class="input-group-text" id="toggle-password" data-toggle="close"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <a href="{{ route('password.request') }}" class="float-end">Forgot Password?</a>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- [Page Specific JS] start -->
    @yield('js-plugin')
    <!-- [Page Specific JS] end -->

    <!-- Required Js -->
    <script src="{{ asset('assets') }}/js/jquery.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/popper.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/fonts/custom-font.js"></script>
    <script src="{{ asset('assets') }}/js/config.js"></script>
    <script src="{{ asset('assets') }}/js/pcoded.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/feather.min.js"></script>

    <script>
        $('#toggle-password').click(function () {
            if( $(this).attr('data-toggle') == 'close' ){
                $(this).html('<i class="fa fa-eye-slash"></i>')
                $('#password').attr('type', 'text')
                $(this).attr('data-toggle', 'open')
            }else{
                $(this).html('<i class="fa fa-eye"></i>')
                $('#password').attr('type', 'password')
                $(this).attr('data-toggle', 'close')
            }
        })
    </script>
</body>
<!-- [Body] end -->
</html>
