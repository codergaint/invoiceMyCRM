@extends('superadmin.layouts.master')
@section('title') @lang('Section Update Homepage') @endsection
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
@slot('title') Homepage Section @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Default Pages <small class="text-success text-sm fw-bold">Hompepage Update</small></h4>
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
                    <p class="text-muted">Update <code>company</code> box using this page</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active"
                                    href="{{ route('homeSection') }}">
                                    <i class="ri-home-4-line d-block fs-20 mb-1"></i>
                                    Back to Home</a>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-lg-9">
                            <div class="tab-content text-muted mt-3 mt-lg-0">
                                <div class="tab-pane fade active show row">
                                    <div class="col-12">
                                        <!-- Statistic section will goes here -->
                                        <h3>Statistic Section</h3>
                                        @if(empty($serviceBox))
                                        <div class="alert alert-info">Sorry! No record found</div>
                                        @else
                                        <form class="form my-4" method="POST" action="{{ route('updateClientBox') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="boxId" value="{{ $serviceBox->id }}">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="companyName" class="form-label">Company Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter service box headline" id="companyName" value="{{ $serviceBox->companyName }}" name="companyName">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($serviceBox->companyLogo))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $serviceBox->companyName }}" src="{{ asset('/') }}public/assets/images/section/{{ $serviceBox->companyLogo }}">
                                                        </div>
                                                        @endif
                                                        <label for="boxImg" class="form-label">Company Logo</label>
                                                        <input type="file" class="form-control"  id="boxImg" name="boxImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        @endif
                                        <!-- Statistic section will end here -->
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
