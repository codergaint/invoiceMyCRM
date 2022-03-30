@extends('superadmin.layouts.master')
@section('title') @lang('Section Update Pricingpage') @endsection
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
@slot('title') Pricingpage Section @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Default Pages <small class="text-success text-sm fw-bold">Pricingpage Update</small></h4>
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
                    <p class="text-muted">Create <code>page</code> section using this box</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link"
                                    href="{{ route('homeSection') }}">
                                    <i class="ri-home-4-line d-block fs-20 mb-1"></i>
                                    Home</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-text-wrap d-block fs-20 mb-1"></i>
                                    About Us</a>
                                <a class="nav-link" href="{{ route('featureSection') }}">
                                    <i class="ri-git-repository-fill d-block fs-20 mb-1"></i>
                                    Feature</a>
                                <a class="nav-link active" href="{{ route('pricingSection') }}">
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
                                        <!-- service section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('savePricingService') }}" enctype="multipart/form-data">
                                        <h3>Pricing Page: Section 2</h3>
                                            @csrf
                                            @if(!empty($priceService))
                                            <input type="hidden" name="section" value="{{ $priceService->section }}">
                                                @php
                                                    $priceServiceHeading    = $priceService->title;
                                                    $priceServiceText       = $priceService->description;
                                                    $writerTxt                = $priceService->writingText;
                                                    $writerHeading            = $priceService->writerHeading;
                                                    $priceServiceBtnTxt     = $priceService->btnTxt;
                                                    $priceServiceBtnUrl     = $priceService->btnUrl;
                                                    $buttonTitle              = $priceService->designerTxt;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="priceServiceSection">
                                                @php
                                                    $priceServiceHeading  = "";
                                                    $priceServiceText     = "";
                                                    $writerTxt              = "";
                                                    $writerHeading          = "";
                                                    $priceServiceBtnTxt   = "";
                                                    $priceServiceBtnUrl   = "";
                                                    $buttonTitle            = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceServiceHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="priceServiceHeading" value="{{ $priceServiceHeading }}" name="priceServiceHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceServiceText" class="form-label">Section Text</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="priceServiceText" name="priceServiceText">{{ $priceServiceText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <form class="form my-4" method="POST" action="{{ route('savePricingBox') }}" enctype="multipart/form-data">
                                        <h3>Section 2: Service Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="priceServiceBox">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="boxHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter box headline" id="boxHeading" name="boxHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="boxText" class="form-label">Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter box text" id="boxText" name="boxText"></textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <div class="table-responsive my-4">
                                            <table class="table">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Text</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $serviceBox = \App\Models\PricingpageModule::where('section','priceServiceBox')->orderBy('id','DESC')->get();
                                                @endphp
                                                @if(count($serviceBox)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($serviceBox as $servBox)
                                                        @php
                                                            $serviceTitle  = $servBox->title;
                                                            $serviceText   = $servBox->description;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $serviceTitle }}</td>
                                                            <td width="40%">{{ $serviceText }}</td>
                                                            <td>
                                                                <a href="{{ route('editPricingBox',['id'=>$servBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delPricingBox',['id'=>$servBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $x++;
                                                        @endphp
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6" class="text-center">Record empty</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- service section will end here -->

                                        <!-- faq qustion section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('savePricingFaqSection') }}" enctype="multipart/form-data">
                                        <h3>Pricing Page: FAQ Section</h3>
                                            @csrf
                                            @if(!empty($priceFaq))
                                            <input type="hidden" name="section" value="{{ $priceFaq->section }}">
                                                @php
                                                    $priceFaqHeading    = $priceFaq->title;
                                                    $priceFaqText       = $priceFaq->description;
                                                    $priceFaqSlogan     = $priceFaq->slogan;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="priceFaqSection">
                                                @php
                                                    $priceFaqHeading  = "";
                                                    $priceFaqText     = "";
                                                    $priceFaqSlogan   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceFaqHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="priceFaqHeading" value="{{ $priceFaqHeading }}" name="priceFaqHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceFaqSlogan" class="form-label">Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter faq slogan" id="priceFaqSlogan" value="{{ $priceFaqSlogan }}" name="priceFaqSlogan">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceFaqText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter faq text" id="priceFaqText" name="priceFaqText">{{ $priceFaqText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <!-- start now section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('savePricingStartNow') }}" enctype="multipart/form-data">
                                        <h3>Pricing Page: Start Now Section</h3>
                                            @csrf
                                            @if(!empty($priceStartNow))
                                            <input type="hidden" name="section" value="{{ $priceStartNow->section }}">
                                                @php
                                                    $priceStartHeading    = $priceStartNow->title;
                                                    $priceStartText       = $priceStartNow->description;
                                                    $priceStartBtnTxt     = $priceStartNow->btnTxt;
                                                    $priceStartBtnUrl     = $priceStartNow->btnUrl;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="priceStartSection">
                                                @php
                                                    $priceStartHeading  = "";
                                                    $priceStartText     = "";
                                                    $priceStartBtnTxt   = "";
                                                    $priceStartBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceStartHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="priceStartHeading" value="{{ $priceStartHeading }}" name="priceStartHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceStartText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="priceStartText" name="priceStartText">{{ $priceStartText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $priceStartBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $priceStartBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->    
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <!-- create now section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('savePricingCreatedNow') }}" enctype="multipart/form-data">
                                        <h3>Pricing Page: Create Account Section</h3>
                                            @csrf
                                            @if(!empty($priceCreatedNow))
                                            <input type="hidden" name="section" value="{{ $priceCreatedNow->section }}">
                                                @php
                                                    $priceCreatedNowHeading = $priceCreatedNow->title;
                                                    $priceCreatedNowText    = $priceCreatedNow->description;
                                                    $priceCreatedNowBtnTxt  = $priceCreatedNow->btnTxt;
                                                    $priceCreatedNowBtnUrl  = $priceCreatedNow->btnUrl;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="priceCreatedNowSection">
                                                @php
                                                    $priceCreatedNowHeading  = "";
                                                    $priceCreatedNowText     = "";
                                                    $priceCreatedNowBtnTxt   = "";
                                                    $priceCreatedNowBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceCreatedNowHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="priceCreatedNowHeading" value="{{ $priceCreatedNowHeading }}" name="priceCreatedNowHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="priceCreatedNowText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="priceCreatedNowText" name="priceCreatedNowText">{{ $priceCreatedNowText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $priceCreatedNowBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $priceCreatedNowBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->    
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
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
