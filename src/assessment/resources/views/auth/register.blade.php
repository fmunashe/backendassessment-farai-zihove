<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Assessment Register</title>
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
                    <!-- Logo-->
                    <div class="card-header pt-4 text-center border-white">
                        <a href="{{route('register')}}">
                            <span>
{{--                                <img src="{{asset('assets/images/sapro_logo.png')}}" alt=""--}}
{{--                                       class="card-img-top img-fluid" height="18">--}}
                            </span>
                        </a>
                    </div>

                    <div class="card-body py-2 px-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a
                                minute </p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Name') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Surname') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                       name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Email Address') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group input-group-sm input-group-merge mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">{{ __('Password') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          id="inputGroup-sizing-sm">{{ __('Confirm Password') }}</span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="row mb-3">
                                <div class="text-center col">
                                    <p class="text-muted">New User?</p>
                                    <button class="btn btn-success form-control" type="submit"> Sign Up</button>
                                </div>
                                <div class="text-center col">
                                    <p class="text-muted">Already have account?</p>
                                    <a href="{{route('login')}}" class="btn btn-info form-control"><b>Back To Log In</b></a>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->


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

<script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>
</body>
</html>
