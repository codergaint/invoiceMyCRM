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
    {{ $companyName }} || Login to your panel
@endsection
@section('authBody')

        <main>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div
                        class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay overlay-primary alpha-8 image-background cover"
                        style="background-image: url(https://picsum.photos/1920/1200/?random&amp;gravity=south);"
                    >
                        <div class="content">
                            <h2 class="display-4 display-md-3 display-lg-2 text-contrast">Get started with <span class="bold d-block">{{ $companyName }}</span></h2>
                            <p class="lead text-contrast">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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
                        <div class="register-form mt-4">
                            <img src="{{ $logo }}" class="logo img-responsive mb-4 mt-2" alt="" />
                            <h1 class="text-darker bold">Register</h1>
                            <p class="text-secondary">Already have an account? <a href="{{ route('userLogin') }}" class="text-primary bold">Login here</a></p>
                                @if(Session::get('success'))
                                  <div class="alert alert-success border-0">
                                    <span>{!! Session::get('success') !!}</span>
                                  </div>
                                @endif
                                @if(Session::get('error'))
                                  <div class="alert alert-danger border-0">
                                    <span>{!! Session::get('error') !!}</span>
                                  </div>
                                @endif
                            <form class="cozy" method="POST" action="{{ route('userSignupConfirm') }}">
                                @csrf
                                <div class="form-group has-icon"><input type="text" id="register_username" class="form-control form-control-rounded" placeholder="Desired userid" name="userid" required /> <i class="icon fas fa-user-plus"></i></div>
                                <div class="form-group has-icon"><input type="text" id="register_fullname" class="form-control form-control-rounded" placeholder="Full name" name="name" required /> <i class="icon fas fa-address-card"></i></div>
                                <div class="form-group has-icon"><input type="text" id="register_email" name="email" class="form-control form-control-rounded" placeholder="Valid email" required /> <i class="icon fas fa-envelope"></i></div>
                                <div class="form-group has-icon"><input type="password" id="register_password" name="password" class="form-control form-control-rounded" placeholder="Password" required /> <i class="icon fas fa-lock"></i></div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-rounded ms-auto">Register <i class="fas fa-long-arrow-alt-right ms-2"></i></button>
                                </div>
                            </form>
                            <div class="mt-5">
                                <p class="small text-secondary">By signing up, I agree to the <a href="terms.html">Terms of Service</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


@endsection
@section('script')
    <script src="{{ asset('public/assets/js/pages/password-addon.init.js') }}"></script>
@endsection
