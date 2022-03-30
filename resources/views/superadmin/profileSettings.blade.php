@extends('superadmin.layouts.master')
@section('title') @lang('Update Profile') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Update Profile @endslot
@endcomponent
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Details Update</h4>
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
                    @if(!empty($profile))
                    <form action="{{ route('saveAdminProfile') }}" class="form" method="POST">
                        @csrf
                        <input type="hidden" name="profileId" value="{{ $profile->id }}">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="profileName" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" name="profileName" id="profileName" value="{{ $profile->name }}" placeholder="Enter admin name">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $profile->email }}" name="email" id="email" placeholder="Enter admin email" readonly>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('updateAdminAvatar') }}" class="form mt-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="profileId" value="{{ $profile->id }}">
                        <input type="hidden" name="profileName" value="{{ $profile->name }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4 class="card-title mb-2 flex-grow-1">Avatar</h4>
                            </div>
                            <div class="col-6 col-md-2">
                                <img class="img-fluid rounded" src="{{ asset('/public/assets/images/admin/'.$profile->avatar) }}" alt="{{ $profile->name }}">
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="avatar" class="form-label">New Avatar</label>
                                <input type="file" name="avatar" class="form-control" id="avatar" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('updateCompPass') }}" class="form mt-4" method="POST">
                        @csrf
                        <input type="hidden" name="profileId" value="{{ $profile->id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4 class="card-title mb-2 flex-grow-1">Credentials update</h4>
                            </div>
                            <div class="col-7 mb-3">
                                <label for="password" class="form-label">Old Password</label>
                                <input type="password" class="form-control" name="oldPass" id="password" placeholder="Enter your old password" required>
                            </div>
                            <div class="col-7 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="newPass" id="password" placeholder="Enter a new password" required>
                            </div>
                            <div class="col-7 mb-3">
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
