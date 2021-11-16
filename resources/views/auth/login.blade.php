@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Login') 2
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
@endsection
<style>
    .auth-full-page-content {
        background: #F7F9FB !important;
    }

    .auth-full-bg {
        background: #F7F9FB !important;
    }

    .auth-full-bg .bg-overlay {
        background: transparent !important;
    }

    .form_bg_login {
        margin: 120px 110px 10px 8px;
        background: white;
        border-radius: 30px;
    }

    .my-auto {
        margin-right: 58px !important;
        margin-left: 54px !important;
    }

    .form-label {
        font-size: 20px;
        color: #120B24;
    }

    .form-control {
        background: #FFFFFF;
        border: 1px solid #E2E6EB;
        box-sizing: border-box !important;
        line-height: 3 !important;
    }

    .lgn_input {
        border-left: none !important;
        border-top-right-radius: 20px !important;
        border-bottom-right-radius: 20px !important;
    }

    .lgn_input_icon {
        border-right: none !important;
        background-color: transparent !important;
        border-bottom-left-radius: 20px !important;
        border-top-left-radius: 20px !important;
    }

    .sgn_btn {
        height: 55px;
        margin-top: 16px;
        border-radius: 20px !important;
    }

    label {
        font-weight: 400 !important;
    }

    .logo_img_login {
        position: absolute;
        left: 78px;
        top: 78px;
        border-radius: 200px;
        width: 104px;
    }
    .bg_img_login {
        position: absolute;
        left: 78px;
        bottom: 10;
        width: 90%;
    }
</style>
@section('body')

    <body class="auth-body-bg">
    @endsection

    @section('content')

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-6">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
                                    <img class="logo_img_login img-responsive" src="{{ asset('assets/images/logo.png') }}">
                                    <img class="bg_img_login img-responsive" src="{{ asset('assets/images/login_bg.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100 form_bg_login">

                                <div class="d-flex flex-column h-100">
                                    <div class="my-auto"
                                         style="margin-bottom:0px !important;margin-top: 65px !important;">

                                        <div>
                                            <h2 style="color: #120B24;font-size: 30px">Sign in</h2>
                                        </div>

                                        <div class="mt-4" style="margin-top: 40px !important;">
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Email</label>
                                                    <div class="input-group">
                                                        <div class="lgn_input_icon input-group-text"><i
                                                                class="fas fa-envelope"></i></div>
                                                        <input name="email" type="email"
                                                               class="lgn_input form-control @error('email') is-invalid @enderror"
                                                               value="{{ old('email', 'admin@themesbrand.com') }}"
                                                               id="username"
                                                               placeholder="Enter Email" autocomplete="email" autofocus>
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        @if (Route::has('password.request'))
                                                            <a href="{{ route('password.request') }}"
                                                               class="text-muted">Forgot password?</a>
                                                        @endif
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div
                                                        class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">

                                                        <div class="input-group">
                                                            <div class="lgn_input_icon input-group-text"><i
                                                                    class="fas fa-lock"></i></div>
                                                            <input type="password" name="password"
                                                                   class="form-control lgn_input  @error('password') is-invalid @enderror"
                                                                   id="userpassword" value="123456"
                                                                   placeholder="Enter password"
                                                                   aria-label="Password"
                                                                   aria-describedby="password-addon">
                                                        </div>

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mt-3 d-grid">
                                                    <button class="sgn_btn btn btn-primary waves-effect waves-light"
                                                            type="submit">Log
                                                        In
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
        <!-- auth-2-carousel init -->
        <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
@endsection
