@extends('superadmin.layouts.master')
@section('title') @lang('Create Company') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') New Company @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Company</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Save Data
                        </button>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter contact email">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phone number">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter login password">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Website</label>
                                <input type="url" class="form-control" id="url" placeholder="Enter company website url">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter company address">
                            </div>
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <select class="form-control" id="currency">
                                    <option value="BDT">BDT</option>
                                    <option value="USD">USD</option>
                                    <option value="GBP">GBP</option>
                                    <option value="EUR">EUR</option>
                                    <option value="JPY">JPY</option>
                                    <option value="INR">INR</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="language" class="form-label">Language</label>
                                <select class="form-control" id="language">
                                    <option value="BDT">BDT</option>
                                    <option value="USD">USD</option>
                                    <option value="GBP">GBP</option>
                                    <option value="EUR">EUR</option>
                                    <option value="JPY">JPY</option>
                                    <option value="INR">INR</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
                            </div>
                            <div class="mb-3">
                                <label for="currDetails" class="form-label">Details</label>
                                <textarea class="form-control" id="currDetails" rows="3" placeholder="Enter at a glance of the company"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Data</button>
                            </div>
                        </form>
                </div>
            </div> <!-- .card-->
            <div class="mb-4">
                <a href="{{ route('companyList') }}" class="btn btn-success btn-sm">Manage Company</a> 
            </div>
            
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
