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
                    @csrf

                    <!-- Tab panes -->
                        <form action="{{ route('saveLayout') }}" method="POST" class="row mb-4">
                            @csrf
                            @php
                                $home = \App\Models\PageConfig::where(['pageName'=>'homepage'])->first();
                                if(!empty($home)):
                                    $pageTitle = $home->pageTitle;
                                else:
                                    $pageTitle = "";
                                endif;
                            @endphp
                            <div class="col-12 col-md-7">
                                <h4>Homepages Pages Layout Settings</h4>
                                <input type="hidden" name="pageName" value="homepage">
                                <div class="my-3">
                                    <label for="pageTitle" class="form-label">Page Title</label>
                                    <input type="text" class="form-control" id="pageTitle" placeholder="Enter page title" value="{{ $pageTitle }}" name="pageTitle">
                                </div>
                                <div class="mb-3">
                                    <label for="pageType" class="form-label">Layout</label>
                                    <select name="pageType" class="form-control">
                                        @if(!empty($home) && $home->pageType=="theme1")
                                            <option value="theme1">Theme 1</option>
                                        @elseif(!empty($home) && $home->pageType=="theme2")
                                            <option value="theme2">Theme 2</option>
                                        @endif
                                        <option value="theme1">Theme 1</option>
                                        <option value="theme2">Theme 2</option>
                                    </select>
                                </div>
                                <div class="text-start mt-4 col-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('saveLayout') }}" method="POST" class="row my-4">
                            @csrf
                            @php
                                $authPage = \App\Models\PageConfig::where(['pageName'=>'authpage'])->first();
                                if(!empty($authPage)):
                                    $authTitle = $authPage->pageTitle;
                                else:
                                    $authTitle = "";
                                endif;
                            @endphp
                            <div class="col-12 col-md-7">
                                <h4>Login/Signup Pages Layout Settings</h4>
                                <input type="hidden" name="pageName" value="authpage">
                                <div class="my-3">
                                    <label for="pageTitle" class="form-label">Page Title</label>
                                    <input type="text" class="form-control" id="pageTitle" placeholder="Enter page title" value="{{ $authTitle }}" name="pageTitle">
                                </div>
                                <div class="mb-3">
                                    <label for="pageType" class="form-label">Layout</label>
                                    <select name="pageType" class="form-control">
                                        @if(!empty($authPage) && $authPage->pageType=="Basic")
                                            <option value="Basic">Basic</option>
                                        @elseif(!empty($authPage) && $authPage->pageType=="Cover")
                                            <option value="Cover">Cover</option>
                                        @endif
                                        <option value="Basic">Basic</option>
                                        <option value="Cover">Cover</option>
                                    </select>
                                </div>
                                <div class="text-start mt-4 col-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
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
