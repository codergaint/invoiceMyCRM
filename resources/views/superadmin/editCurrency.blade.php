@extends('superadmin.layouts.master')
@section('title') @lang('Update Currency') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Update Currency @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Currency</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Update Data
                        </button>
                    </div>
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
                    @if(!empty($currency))
                    <form action="{{ route('updateCurrency') }}" method="POST">
                        @csrf
                        <input type="hidden" name="currId" value="{{ $currency->id }}">
                        <div class="mb-3">
                            <label for="currencyName" class="form-label">Currency Name</label>
                            <input type="text" class="form-control" name="currencyName" id="currencyName" placeholder="Enter currency name" value="{{ $currency->currency }}">
                        </div>
                        <div class="mb-3">
                            <label for="shortName" class="form-label">Short Name</label>
                            <input type="text" class="form-control" id="shortName" placeholder="Enter language short name" name="shortName" value="{{ $currency->shortCode }}">
                        </div>
                        <div class="mb-3">
                            <label for="symble" class="form-label">Symble</label>
                            <input type="text" class="form-control" id="symble" placeholder="Enter currency symble" name="symble" value="{{ $currency->symble }}">
                        </div>
                        <div class="mb-3">
                            <label for="currStatus" class="form-label">Status</label>
                            <select class="form-control" name="currStatus" id="currStatus">
                                <option value="{{ $currency->status }}">{{ $currency->status }}</option>
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rtl" class="form-label">RTL</label>
                            <select  class="form-control" name="rtl" id="rtl">
                                <option value="{{ $currency->rtl }}">{{ $currency->rtl }}</option>
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-danger">Sorry! No record found</div>
                    @endif
                </div>
            </div> <!-- .card-->
            <div class="mb-4">
                <a href="{{ route('currencyList') }}" class="btn btn-success btn-sm">Manage Currency</a> 
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
