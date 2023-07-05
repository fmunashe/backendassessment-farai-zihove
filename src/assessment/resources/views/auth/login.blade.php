<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Sapro Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/sapro_logo_two.png')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="loading authentication-bg"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-5">
                <div class="card">
                    <div class="card-header text-center border-white">
                        <a href="/">
                            <span>
{{--                                <img src="{{asset('assets/images/sapro_logo.png')}}" alt=""--}}
{{--                                       class="card-img-top img-fluid">--}}
                            </span>
                        </a>
                    </div>
                    <div class="card-body py-2 px-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access the platform.</p>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           autocomplete="current-password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="text-center col">
                                    <button class="btn btn-success btn-block form-control" type="submit"> {{ __('Login') }}</button>
                                </div>

{{--                                <div class="text-center col">--}}
{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-danger" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

                                <div class="text-center col">
                                        <a class="btn btn-info form-control" href="{{ route('register') }}">
                                            {{ __('Sign Up') }}
                                        </a>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    {{date('Y')}} &copy; Assessment
</footer>

<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

</body>
</html>
