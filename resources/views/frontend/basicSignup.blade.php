@extends('superadmin.layouts.master-without-nav')
@php
    $details = \App\Models\GeneralSettings::orderBy('id','DESC')->first();
    if(!empty($details)):
        $companyName    = $details->companyName;
        $address        = $details->address;
        $phone          = $details->phone;
        $email          = $details->email;
        $lightlogo      = url('/').'/public/assets/images/logo/'.$details->frontLogo;
        $logo           = url('/').'/public/assets/images/logo/'.$details->randLogo;
        $favicon        = url('/').'/public/assets/images/logo/'.$details->favicon;
    else:
        $companyName    = "";
        $address        = "";
        $phone          = "";
        $email          = "";
        $logo           = "{{ asset('/') }}assets/img/logo.png";
        $lightlogo      = "{{ asset('/') }}assets/img/logo-light.png";
        $favicon        = "{{ asset('/') }}assets/css/frontend/appd75d.css?id=949b14b0a8504644cabc";
    endif;
@endphp
@section('title')
    @if(!empty($layout->pageTitle))
        {{ $layout->pageTitle }}
    @else
        @lang('Admin Login')
    @endif
@endsection
@section('content')

<div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-md-3 mx-auto">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img class="img-fluid" src="{{ $lightlogo }}" alt="{{ $companyName }}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                @if(Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {!! Session::get('success') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                @if(Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {!! Session::get('error') !!}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign up to continue to {{ $companyName }}.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('userSignupConfirm') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="fullName" id="fullName"
                                                placeholder="Enter full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="emailAddress" id="emailAddress"
                                                placeholder="Enter email address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">User ID</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Enter user ID" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5"
                                                    placeholder="Enter password" name="password" id="password-input">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Signup</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            &copy; <script>
                                document.write(new Date().getFullYear())
                            </script> {{ $companyName }} <i
                                    class="mdi mdi-heart text-danger"></i> All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

@endsection
@section('script')
    <script src="{{ asset('public/assets/js/pages/password-addon.init.js') }}"></script>
@endsection
