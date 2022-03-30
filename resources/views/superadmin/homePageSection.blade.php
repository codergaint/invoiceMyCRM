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
                    <p class="text-muted">Create <code>page</code> using this box</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active"
                                    href="{{ route('homeSection') }}">
                                    <i class="ri-home-4-line d-block fs-20 mb-1"></i>
                                    Home</a>
                                <a class="nav-link" href="#">
                                    <i class="ri-text-wrap d-block fs-20 mb-1"></i>
                                    About Us</a>
                                <a class="nav-link" href="{{ route('featureSection') }}">
                                    <i class="ri-git-repository-fill d-block fs-20 mb-1"></i>
                                    Feature</a>
                                <a class="nav-link" href="{{ route('pricingSection') }}">
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
                                        <!-- Slider section will goes here -->
                                        <h3>Slider Section</h3>
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection1') }}" enctype="multipart/form-data">
                                            @csrf
                                            @if(!empty($section1))
                                            <input type="hidden" name="section" value="{{ $section1->section }}">
                                                @php
                                                    $sliderHeading  = $section1->title;
                                                    $sliderSlogan   = $section1->slogan;
                                                    $sliderMedia    = $section1->logo;
                                                    $sliderText     = $section1->description;
                                                    $sliderBtnTxt   = $section1->btnTxt;
                                                    $sliderBtnUrl   = $section1->btnUrl;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section1">
                                                @php
                                                    $sliderHeading  = "";
                                                    $sliderSlogan   = "";
                                                    $sliderMedia    = "";
                                                    $sliderText     = "";
                                                    $sliderBtnTxt   = "";
                                                    $sliderBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="sliderHeading" class="form-label">Slider Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter slider headline" id="sliderHeading" value="{{ $sliderHeading }}" name="sliderHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="sliderSlogan" class="form-label">Slider Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter slider slogan" id="sliderSlogan" value="{{ $sliderSlogan }}" name="sliderSlogan">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="sliderText" class="form-label">Slider Text</label>
                                                        <textarea class="form-control" placeholder="Enter company name" id="sliderText" name="sliderText">{{ $sliderText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter slider button text" id="btnTxt" value="{{ $sliderBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $sliderBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($sliderMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $sliderHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $sliderMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="slideImg" class="form-label">Slider Image</label>
                                                        <input type="file" class="form-control"  id="slideImg" name="slideImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <!-- Slider section will end here -->


                                        <!-- Statistic section will goes here -->
                                        <h3>Statistic Section</h3>
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection2') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="section" value="Section2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="statisticHeading" class="form-label">Statistic Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter statistic headline" id="statisticHeading" name="statisticHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="statisticSlogan" class="form-label">Statistic Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter statistic slogan" id="statisticSlogan" name="statisticSlogan">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="statisticText" class="form-label">Statistic Text</label>
                                                        <textarea class="form-control" placeholder="Enter statistic text" id="statisticText" name="statisticText"></textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="statisticMeter" class="form-label">Statistic Meter</label>
                                                        <input type="number" class="form-control" placeholder="Enter statistic meter value" id="statisticMeter" name="statisticMeter">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="statisImgstatisImg" class="form-label">Statistic Image</label>
                                                        <input type="file" class="form-control"  id="statisImg" name="statisImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <div class="table-responsive my-4">
                                            <table class="table">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Slogan</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                @if(count($section2)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($section2 as $sec2)
                                                        @php
                                                            $statisticHeading  = $sec2->title;
                                                            $statisticSlogan   = $sec2->slogan;
                                                            $statisticMedia    = $sec2->logo;
                                                            $statisticText     = $sec2->statisticText;
                                                            $statisticMeter    = $sec2->statisticMeter;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $statisticHeading }}</td>
                                                            <td>{{ $statisticSlogan }}</td>
                                                            <td><img height="30" width="70" src="@if(!empty($statisticMedia)) {{ asset('/') }}public/assets/images/section/{{ $statisticMedia }} @else {{ asset('/') }}assets/img/automate-social/icons/6.svg @endif"></td>
                                                            <td>
                                                                <a href="{{ route('editStatistic',['id'=>$sec2->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delStatistic',['id'=>$sec2->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- Statistic section will end here -->

                                        <!-- All in one section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection3') }}" enctype="multipart/form-data">
                                        <h3>All in one section</h3>
                                            @csrf
                                            @if(!empty($section3))
                                            <input type="hidden" name="section" value="{{ $section3->section }}">
                                                @php
                                                    $aioHeading  = $section3->title;
                                                    $aioSlogan   = $section3->slogan;
                                                    $aioMedia    = $section3->logo;
                                                    $aioText     = $section3->description;
                                                    $aioBtnTxt   = $section3->btnTxt;
                                                    $aioBtnUrl   = $section3->btnUrl;
                                                    $buttonBoxSlogan  = $section3->boxHeading;
                                                    $buttonBoxText   = $section3->boxText;
                                                    $aioVideoLink   = $section3->videoLink3
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section3">
                                                @php
                                                    $aioHeading  = "";
                                                    $aioSlogan   = "";
                                                    $aioMedia    = "";
                                                    $aioText     = "";
                                                    $aioBtnTxt   = "";
                                                    $aioBtnUrl   = "";
                                                    $buttonBoxSlogan   = "";
                                                    $buttonBoxText   = "";
                                                    $aioVideoLink   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="aioHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="aioHeading" value="{{ $aioHeading }}" name="aioHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="aioSlogan" class="form-label">Section Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter section slogan" id="aioSlogan" value="{{ $aioSlogan }}" name="aioSlogan">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="aioText" class="form-label">Section Text</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="aioText" name="aioText">{{ $aioText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $aioBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $aioBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="videoUrl" class="form-label">Youtube Video URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="videoUrl" value="{{ $aioVideoLink }}" name="videoUrl">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="buttonBoxSlogan" class="form-label">Button Box Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter button box slogan" id="buttonBoxSlogan" value="{{ $buttonBoxSlogan }}" name="buttonBoxSlogan">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="buttonBoxText" class="form-label">Button Box Text</label>
                                                        <textarea class="form-control" placeholder="Enter button box text" id="buttonBoxText" name="buttonBoxText">{{ $buttonBoxText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($aioMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $aioHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $aioMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="sectionImg" class="form-label">Section Media</label>
                                                        <input type="file" class="form-control"  id="sectionImg" name="sectionImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <!-- All in one section will end here -->

                                        <!-- why dashcore section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection4') }}" enctype="multipart/form-data">
                                        <h3>Why section</h3>
                                            @csrf
                                            @if(!empty($section4))
                                            <input type="hidden" name="section" value="{{ $section4->section }}">
                                                @php
                                                    $whyHeading  = $section4->title;
                                                    $whySlogan   = $section4->slogan;
                                                    $whyMedia    = $section4->logo;
                                                    $whyBtnTxt   = $section4->btnTxt;
                                                    $whyBtnUrl   = $section4->btnUrl;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section4">
                                                @php
                                                    $whyHeading  = "";
                                                    $whySlogan   = "";
                                                    $whyMedia    = "";
                                                    $whyBtnTxt   = "";
                                                    $whyBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="whyHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter why headline" id="whyHeading" value="{{ $whyHeading }}" name="whyHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="whySlogan" class="form-label">Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter slogan" id="whySlogan" value="{{ $whySlogan }}" name="whySlogan">
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $whyBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $whyBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($whyMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $whyHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $whyMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="whyImg" class="form-label">Media</label>
                                                        <input type="file" class="form-control"  id="whyImg" name="whyImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <form class="form my-4" method="POST" action="{{ route('saveSection4Box') }}" enctype="multipart/form-data">
                                        <h3>Section 4-Right Side Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="Section4Box">
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
                                                    $section4Box = \App\Models\HomepageModule::where('section','Section4Box')->orderBy('id','ASC')->get();
                                                @endphp
                                                @if(count($section4Box)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($section4Box as $sb4)
                                                        @php
                                                            $sb4heading  = $sb4->title;
                                                            $sb4Slogan   = $sb4->description;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $sb4heading }}</td>
                                                            <td width="40%">{{ $sb4Slogan }}</td>
                                                            <td>
                                                                <a href="{{ route('editSB4',['id'=>$sb4->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delSB4',['id'=>$sb4->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- Why dashcore section will end here -->

                                        <!-- fifth section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection5') }}" enctype="multipart/form-data">
                                        <h3>Advance Automation section</h3>
                                            @csrf
                                            @if(!empty($section5))
                                            <input type="hidden" name="section" value="{{ $section5->section }}">
                                                @php
                                                    $amHeading  = $section5->title;
                                                    $amText     = $section5->description;
                                                    $amMedia    = $section5->logo;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section5">
                                                @php
                                                    $amHeading  = "";
                                                    $amText     = "";
                                                    $amMedia    = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="amHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter am headline" id="amHeading" value="{{ $amHeading }}" name="amHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="amText" class="form-label">Slogan</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter text" id="amText" name="amText">{{ $amText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($amMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $amHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $amMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="amImg" class="form-label">Media</label>
                                                        <input type="file" class="form-control"  id="amImg" name="amImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <!-- fifth section will end here -->
                                        

                                        <!-- sixth section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection6') }}" enctype="multipart/form-data">
                                        <h3>Section Six</h3>
                                            @csrf
                                            @if(!empty($section6))
                                            <input type="hidden" name="section" value="{{ $section6->section }}">
                                                @php
                                                    $sixthBtnTxt    = $section6->btnTxt;
                                                    $sixthHeading  = $section6->title;
                                                    $sixthText     = $section6->description;
                                                    $sixthMedia    = $section6->logo;
                                                    $rightMedia    = $section6->rightImg;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section6">
                                                @php
                                                    $sixthBtnTxt   = "";
                                                    $sixthHeading  = "";
                                                    $sixthText     = "";
                                                    $sixthMedia    = "";
                                                    $rightMedia    = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="sixthHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="sixthHeading" value="{{ $sixthHeading }}" name="sixthHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="sixthText" class="form-label">Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter text" id="sixthText" name="sixthText">{{ $sixthText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="sixthBtnTxt" class="form-label">Button Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter button text" id="sixthBtnTxt" name="sixthBtnTxt">{{ $sixthBtnTxt }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($sixthMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $sixthHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $sixthMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="sixthImg" class="form-label">Left Media</label>
                                                        <input type="file" class="form-control"  id="sixthImg" name="sixthImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($rightMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $sixthHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $rightMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="rightImg" class="form-label">Right Media</label>
                                                        <input type="file" class="form-control"  id="rightImg" name="rightImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <form class="form my-4" method="POST" action="{{ route('saveSixthBox') }}" enctype="multipart/form-data">
                                        <h3>Section 6-Right Side Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="Section6Box">
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
                                                    $sixthBox = \App\Models\HomepageModule::where('section','Section6Box')->orderBy('id','DESC')->get();
                                                @endphp
                                                @if(count($sixthBox)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($sixthBox as $sBox)
                                                        @php
                                                            $statisticHeading  = $sBox->title;
                                                            $statisticSlogan   = $sBox->description;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $statisticHeading }}</td>
                                                            <td width="40%">{{ $statisticSlogan }}</td>
                                                            <td>
                                                                <a href="{{ route('editSixthBox',['id'=>$sBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delSixthBox',['id'=>$sBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- sixth section will end here -->

                                        <!-- seventh section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection7') }}" enctype="multipart/form-data">
                                        <h3>Section Seven</h3>
                                            @csrf
                                            @if(!empty($section7))
                                            <input type="hidden" name="section" value="{{ $section7->section }}">
                                                @php
                                                    $seventhHeading  = $section7->title;
                                                    $seventhText     = $section7->description;
                                                    $designerText    = $section7->designerTxt;
                                                    $designerHeading = $section7->designerHeading;
                                                    $designerMedia   = $section7->designerImg;
                                                    $developerText   = $section7->developerTxt;
                                                    $developerHeading= $section7->developerHeading;
                                                    $developerMedia  = $section7->developerImg;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section7">
                                                @php
                                                    $seventhHeading  = "";
                                                    $seventhText     = "";
                                                    $designerText    = "";
                                                    $designerHeading = "";
                                                    $designerMedia   = "";
                                                    $developerText   = "";
                                                    $developerHeading= "";
                                                    $developerMedia  = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="seventhHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter section headline" id="seventhHeading" value="{{ $seventhHeading }}" name="seventhHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="seventhText" class="form-label">Section Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter section text" id="seventhText" name="seventhText">{{ $seventhText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="designerHeading" class="form-label">Designer Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter designer headline" id="designerHeading" value="{{ $designerHeading }}" name="designerHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="designerText" class="form-label">Designer Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter designer text" id="designerText" name="designerText">{{ $designerText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($designerMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $designerHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $designerMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="designImg" class="form-label">Designer Media</label>
                                                        <input type="file" class="form-control"  id="designImg" name="designImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="developerHeading" class="form-label">Developer Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter developer headline" id="developerHeading" value="{{ $developerHeading }}" name="developerHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="developerText" class="form-label">Developer Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter developer text" id="developerText" name="developerText">{{ $developerText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($developerMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $developerHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $developerMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="developImg" class="form-label">Developer Media</label>
                                                        <input type="file" class="form-control"  id="developImg" name="developImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <!-- Seventh section end here -->

                                        <!-- eight section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveHomeSection8') }}" enctype="multipart/form-data">
                                        <h3>Section Eight</h3>
                                            @csrf
                                            @if(!empty($section8))
                                            <input type="hidden" name="section" value="{{ $section8->section }}">
                                                @php
                                                    $eighthHeading      = $section8->title;
                                                    $eighthText         = $section8->description;
                                                    $writerTxt          = $section8->writingText;
                                                    $writerHeading      = $section8->writerHeading;
                                                    $eighthBtnTxt       = $section8->btnTxt;
                                                    $eighthBtnUrl       = $section8->btnUrl;
                                                    $buttonTitle        = $section8->designerTxt;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section8">
                                                @php
                                                    $eighthHeading      = "";
                                                    $eighthText         = "";
                                                    $writerTxt          = "";
                                                    $writerHeading      = "";
                                                    $eighthBtnTxt       = "";
                                                    $eighthBtnUrl       = "";
                                                    $buttonTitle        = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="eighthHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="eighthHeading" value="{{ $eighthHeading }}" name="eighthHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="eighthText" class="form-label">Section Text</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="eighthText" name="eighthText">{{ $eighthText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="writerHeading" class="form-label">Type Writer</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="writerHeading" value="{{ $writerHeading }}" name="writerHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="writerTxt" class="form-label">Witer Text</label>
                                                        <textarea class="form-control" placeholder="Enter type writer text" id="writerTxt" name="writerTxt">{{ $writerTxt }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $eighthBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $eighthBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="buttonTitle" class="form-label">Button Box Text</label>
                                                        <textarea class="form-control" placeholder="Enter button box text" id="buttonTitle" name="buttonTitle">{{ $buttonTitle }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <form class="form my-4" method="POST" action="{{ route('saveServiceBox') }}" enctype="multipart/form-data">
                                        <h3>Section 8-Service Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="Section8Box">
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
                                                    $serviceBox = \App\Models\HomepageModule::where('section','Section8Box')->orderBy('id','DESC')->get();
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
                                                                <a href="{{ route('editServiceBox',['id'=>$servBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delServiceBox',['id'=>$servBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- section eight will end here -->

                                        <!-- client logo list -->
                                        <form class="form my-4" method="POST" action="{{ route('saveClientBox') }}" enctype="multipart/form-data">
                                        <h3>Company List Slider Section</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="Section9">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="companyName" class="form-label">Company Name</label>
                                                        <input type="text" class="form-control" placeholder="Enter company name" id="companyName" name="companyName">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="boxImg" class="form-label">Company Logo</label>
                                                        <input type="file" class="form-control" id="boxImg" name="boxImg">
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
                                                    <th>Company</th>
                                                    <th>Media</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $companyList = \App\Models\HomepageModule::where('section','Section9')->orderBy('id','DESC')->get();
                                                @endphp
                                                @if(count($companyList)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($companyList as $comp)
                                                        @php
                                                            $comapanyName   = $comp->companyName;
                                                            $compLogo       = $comp->companyLogo;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $comapanyName }}</td>
                                                            <td><img height="30" width="70" src="@if(!empty($compLogo)) {{ asset('/') }}public/assets/images/section/{{ $compLogo }} @else {{ asset('/') }}assets/img/automate-social/icons/6.svg @endif"></td>
                                                            <td>
                                                                <a href="{{ route('editClientBox',['id'=>$comp->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delClientBox',['id'=>$comp->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- section eight will end here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveOportunity') }}" enctype="multipart/form-data">
                                            <h3>Carrier Oportunity Section</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="OportunityBox">
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
                                                    $oportunityBox = \App\Models\HomepageModule::where('section','OportunityBox')->orderBy('id','DESC')->get();
                                                @endphp
                                                @if(count($oportunityBox)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($oportunityBox as $opBox)
                                                        @php
                                                            $oportunityTitle  = $opBox->title;
                                                            $oportunityText   = $opBox->description;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $oportunityTitle }}</td>
                                                            <td width="40%">{{ $oportunityText }}</td>
                                                            <td>
                                                                <a href="{{ route('editOportunity',['id'=>$opBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delOportunity',['id'=>$opBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- Last section  -->
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
