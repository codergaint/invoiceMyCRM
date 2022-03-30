@extends('superadmin.layouts.master')
@section('title') @lang('Server Default Page') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
<!-- quill css -->
<link href="{{ asset('/') }}public/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Default Page @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Default Pages <small class="text-success text-sm fw-bold">Frontend</small></h4>
                </div><!-- end card header -->

                <div class="card-body">
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
                    <p class="text-muted">Create <code>page</code> using this box</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active"
                                    href="#">
                                    <i class="ri-home-4-line d-block fs-20 mb-1"></i>
                                    Home</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-text-wrap d-block fs-20 mb-1"></i>
                                    About Us</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-git-repository-fill d-block fs-20 mb-1"></i>
                                    Feature</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-money-pound-circle-fill d-block fs-20 mb-1"></i>
                                    Pricing</a>
                                <a class="nav-link" href="#tab">
                                    <i class="ri-lifebuoy-fill d-block fs-20 mb-1"></i>
                                    Support</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-lifebuoy-line d-block fs-20 mb-1"></i>
                                    Contact</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-registered-fill d-block fs-20 mb-1"></i>
                                    Signup</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-login-circle-fill d-block fs-20 mb-1"></i>
                                    Login</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-lock-password-fill d-block fs-20 mb-1"></i>
                                    Forgot Password</a>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-lg-9">
                            <div class="tab-content text-muted mt-3 mt-lg-0">
                                <div class="tab-pane fade active show row">
                                    <div class="col-12">
                                        <form class="form" method="POST" action="{{ route('saveHomeSection1') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter your firstname" id="firstNameinput">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="lastNameinput" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter your lastname" id="lastNameinput">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="compnayNameinput" class="form-label">Company Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter company name" id="compnayNameinput">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                        <input type="tel" class="form-control" placeholder="+(245) 451 45123" id="phonenumberInput">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="emailidInput" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" placeholder="example@gamil.com" id="emailidInput">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="address1ControlTextarea" class="form-label">Address</label>
                                                        <input type="text" class="form-control" placeholder="Address 1" id="address1ControlTextarea">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="citynameInput" class="form-label">City</label>
                                                        <input type="email" class="form-control" placeholder="Enter your city" id="citynameInput">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">State</label>
                                                        <select id="ForminputState" class="form-select">
                                                            <option selected>Choose...</option>
                                                            <option>...</option>
                                                        </select>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div>
            </div> <!-- .card-->
        </div> <!-- .col-->
        <!-- end col -->
    </div>
@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ asset('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ asset('public/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{asset('public/assets/js/pages/listjs.init.js') }}"></script>

<!-- ckeditor -->
<script src="{{asset('public/assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>

<!-- quill js -->
<script src="{{asset('public/assets/libs/quill/quill.min.js') }}"></script>

<!-- init js -->
<script src="{{asset('public/assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{ asset('public/assets/js/app.min.js') }}"></script>
@endsection
