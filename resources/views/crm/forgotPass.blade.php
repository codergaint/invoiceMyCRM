@extends('crm.layout.authHeader')
@php
    if(!empty($details)):
        $companyName    = $details->companyName;
        $address        = $details->address;
        $phone          = $details->phone;
        $email          = $details->email;
        $lightlogo      = url('/').'/public/assets/images/logo/'.$details->frontLogo;
        $logo           = url('/').'/public/assets/images/logo/'.$details->randLogo;
        $favicon        = url('/').'/public/assets/images/logo/'.$details->favicon;
    else:
        $companyName    = "invoiceMyCRM";
        $address        = "";
        $phone          = "";
        $email          = "";
        $logo           = "{{ asset('/') }}assets/img/logo.png";
        $lightlogo      = "{{ asset('/') }}assets/img/logo-light.png";
        $favicon        = "{{ asset('/') }}assets/css/frontend/appd75d.css?id=949b14b0a8504644cabc";
    endif;
@endphp
@section('authTitle')
    {{ $companyName }} || Recover your account
@endsection
@section('authBody')
        <main>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div
                        class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay overlay-primary alpha-8 image-background cover"
                        style="background-image: url(https://picsum.photos/1920/1200/?random&amp;gravity=west);"
                    >
                        <div class="content">
                            <h2 class="display-4 display-md-3 display-lg-2 text-contrast mt-4 mt-md-0">Forgot <span class="bold d-block">Password?</span></h2>
                            <p class="lead text-contrast">We've got you covered</p>
                            <hr class="mt-md-6 w-25" />
                            <div class="d-flex flex-column">
                                <p class="small bold text-contrast">Or sign up with</p>
                                <nav class="nav mb-4">
                                    <a class="btn btn-circle btn-outline-contrast me-2" href="#"><i class="fab fa-facebook-f"></i></a> <a class="btn btn-circle btn-outline-contrast me-2" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-circle btn-outline-contrast" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 mx-auto">
                        <div class="forgot-form mt-5 mt-md-0">
                            <img src="{{ $logo }}" class="logo img-responsive mb-4 mb-md-6" alt="" />
                            <h1 class="text-darker bold">Forgot your password?</h1>
                            <p class="text-secondary mt-0 mb-4 mb-md-6">Enter your email bellow to retrieve your account or <a href="{{ route('userLogin') }}" class="text-primary bold">Login</a></p>
                            <form class="cozy" action="{{ route('userSendVerify') }}" data-validate-on="submit" novalidate>
                                <div class="form-group has-icon"><input type="text" id="register_email" class="form-control form-control-rounded" placeholder="Your registered email" /> <i class="icon fas fa-envelope"></i></div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-rounded ms-auto">Send reset link <i class="fas fa-long-arrow-alt-right ms-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection
@section('script')
    <script src="{{ asset('public/assets/js/pages/password-addon.init.js') }}"></script>
@endsection
