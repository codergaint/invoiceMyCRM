@extends('superadmin.layouts.master')
@section('title') @lang('Update Company') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Update Company @endslot
@endcomponent
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Details Update</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('companyList') }}" class="btn btn-info btn-sm">
                            <i class="ri-building-2-line align-middle"></i> List
                        </a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body"><!-- Primary Alert -->
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
                    @if(!empty($company))
                    <form action="{{ route('updateCompany') }}" class="form" method="POST">
                        @csrf
                        <input type="hidden" name="companyId" value="{{ $company->id }}">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="companyName" id="companyName" value="{{ $company->companyName }}" placeholder="Enter company name">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $company->phoneNumber }}" placeholder="Enter phone number">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="url" class="form-label">Website</label>
                                <input type="url" value="{{ $company->website }}" class="form-control" name="url" id="url" placeholder="Enter company website url">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" value="{{ $company->address }}" class="form-control" name="address" id="address" placeholder="Enter company address">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <select class="form-control" name="currency" id="currency">
                                    <option value="{{ $company->currId }}">{{ $company->currId }}</option>
                                    <option value="BDT">BDT</option>
                                    <option value="USD">USD</option>
                                    <option value="GBP">GBP</option>
                                    <option value="EUR">EUR</option>
                                    <option value="JPY">JPY</option>
                                    <option value="INR">INR</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="language" class="form-label">Language</label>
                                <select class="form-control" name="language" id="language">
                                    <option value="{{ $company->langId }}">{{ $company->langId }}</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="US English">US English</option>
                                    <option value="UK English">UK English</option>
                                    <option value="Hindi">Hindi</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="timeZone" class="form-label">Time Zone</label>
                                <select class="form-control" name="timeZone" id="timeZone">
                                    <option value="{{ $company->tzId }}">{{ $company->tzId }}</option>
                                    <option value="UTC+3">UTC+3</option>
                                    <option value="UTC+2">UTC+2</option>
                                    <option value="UTC+1">UTC+1</option>
                                    <option value="UTC+0">UTC+0</option>
                                    <option value="UTC-0">UTC-0</option>
                                    <option value="UTC-1">UTC-1</option>
                                    <option value="UTC-2">UTC-2</option>
                                    <option value="UTC-3">UTC-3</option>
                                </select>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('updateCompLogo') }}" class="form mt-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="companyId" value="{{ $company->id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4 class="card-title mb-2 flex-grow-1">Logo Update</h4>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('/public/assets/images/company/'.$company->logo) }}" alt="{{ $company->companyName }}">
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="logo" class="form-label">New Logo</label>
                                <input type="file" name="logo" class="form-control" id="logo" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('updateCompPass') }}" class="form mt-4" method="POST">
                        @csrf
                        <input type="hidden" name="companyId" value="{{ $company->id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4 class="card-title mb-2 flex-grow-1">Credentials update</h4>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $company->email }}" name="email" id="email" placeholder="Enter contact email" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="oldPass" id="password" placeholder="Enter your old password" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="newPass" id="password" placeholder="Enter a new password" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPass" id="password" placeholder="Confirm new password" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    @else
                        <div class="alert alert-info">Sorry! No data found</div>
                    @endif;
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
<script src="{{ asset('public/assets/js/app.min.js') }}"></script>
@endsection
