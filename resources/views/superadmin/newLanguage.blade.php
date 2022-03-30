@extends('superadmin.layouts.master')
@section('title') @lang('Create Language') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') New Language @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Language</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Save Data
                        </button>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="languageName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="languageName" placeholder="Enter language name" name="languageName">
                        </div>
                        <div class="mb-3">
                            <label for="shortName" class="form-label">Short Name</label>
                            <input type="text" class="form-control" id="shortName" placeholder="Enter language short name" name="shortName">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select  class="form-control" id="status">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rtl" class="form-label">RTL</label>
                            <select  class="form-control" id="rtl">
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="currDetails" class="form-label">Details</label>
                            <textarea class="form-control" id="currDetails" rows="3" placeholder="Enter at a glance of the language"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
                </div>
            </div> <!-- .card-->
            <div class="mb-4">
                <a href="{{ route('languageList') }}" class="btn btn-success btn-sm">Manage Language</a> 
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
