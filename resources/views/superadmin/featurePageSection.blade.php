@extends('superadmin.layouts.master')
@section('title') @lang('Section Update Featurepage') @endsection
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
@slot('title') Featurepage Section @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Default Pages <small class="text-success text-sm fw-bold">Featurepage Update</small></h4>
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
                                <a class="nav-link active" href="{{ route('featureSection') }}">
                                    <i class="ri-git-repository-fill d-block fs-20 mb-1"></i>
                                    Feature</a>
                                <a class="nav-link" href="{{ route('pricingSection') }}">
                                    <i class="ri-money-pound-circle-fill d-block fs-20 mb-1"></i>
                                    Feature</a>
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
                                        <!-- create now section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveFeaturePageSection') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Page Details</h3>
                                            @csrf
                                            @if(!empty($featurePageDetails))
                                            <input type="hidden" name="section" value="{{ $featurePageDetails->section }}">
                                            @php
                                            $featurePageDetailsHeading = $featurePageDetails->title;
                                            $featurePageDetailsText    = $featurePageDetails->description;
                                            $featurePageDetailsBtnTxt  = $featurePageDetails->btnTxt;
                                            $featurePageDetailsBtnUrl  = $featurePageDetails->btnUrl;
                                            @endphp
                                            @else
                                            <input type="hidden" name="section" value="featurePageDetailsSection">
                                                @php
                                                    $featurePageDetailsHeading  = "";
                                                    $featurePageDetailsText     = "";
                                                    $featurePageDetailsBtnTxt   = "";
                                                    $featurePageDetailsBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featurePageDetailsHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="featurePageDetailsHeading" value="{{ $featurePageDetailsHeading }}" name="featurePageDetailsHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featurePageDetailsText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="featurePageDetailsText" name="featurePageDetailsText">{{ $featurePageDetailsText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $featurePageDetailsBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $featurePageDetailsBtnUrl }}" name="btnUrl">
                                                    </div>
                                                </div><!--end col-->    
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <!-- service section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureService') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Section 2</h3>
                                            @csrf
                                            @if(!empty($featureService))
                                            <input type="hidden" name="section" value="{{ $featureService->section }}">
                                                @php
                                                    $featureServiceHeading    = $featureService->title;
                                                    $featureServiceText       = $featureService->description;
                                                    $writerTxt                = $featureService->writingText;
                                                    $writerHeading            = $featureService->writerHeading;
                                                    $featureServiceBtnTxt     = $featureService->btnTxt;
                                                    $featureServiceBtnUrl     = $featureService->btnUrl;
                                                    $buttonTitle              = $featureService->designerTxt;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="featureServiceSection">
                                                @php
                                                    $featureServiceHeading  = "";
                                                    $featureServiceText     = "";
                                                    $writerTxt              = "";
                                                    $writerHeading          = "";
                                                    $featureServiceBtnTxt   = "";
                                                    $featureServiceBtnUrl   = "";
                                                    $buttonTitle            = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureServiceHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="featureServiceHeading" value="{{ $featureServiceHeading }}" name="featureServiceHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureServiceText" class="form-label">Section Text</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="featureServiceText" name="featureServiceText">{{ $featureServiceText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>

                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureBox') }}" enctype="multipart/form-data">
                                        <h3>Section 2: Service Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="featureServiceBox">
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
                                                    $serviceBox = \App\Models\FeaturepageModule::where('section','featureServiceBox')->orderBy('id','DESC')->get();
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
                                                                <a href="{{ route('editFeatureBox',['id'=>$servBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delFeatureBox',['id'=>$servBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- third section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureSection3') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Section 3</h3>
                                            @csrf
                                            @if(!empty($feature3))
                                            <input type="hidden" name="section" value="{{ $feature3->section }}">
                                                @php
                                                    $thirdBtnTxt   = $feature3->btnTxt;
                                                    $thirdHeading  = $feature3->title;
                                                    $thirdText     = $feature3->description;
                                                    $thirdMedia    = $feature3->logo;
                                                    $rightMedia    = $feature3->rightImg;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section3">
                                                @php
                                                    $thirdBtnTxt   = "";
                                                    $thirdHeading  = "";
                                                    $thirdText     = "";
                                                    $thirdMedia    = "";
                                                    $rightMedia    = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="thirdHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="thirdHeading" value="{{ $thirdHeading }}" name="thirdHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="thirdText" class="form-label">Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter text" id="thirdText" name="thirdText">{{ $thirdText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="thirdBtnTxt" class="form-label">Button Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter button text" id="thirdBtnTxt" name="thirdBtnTxt">{{ $thirdBtnTxt }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($thirdMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $thirdHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $thirdMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="thirdImg" class="form-label">Left Media</label>
                                                        <input type="file" class="form-control"  id="thirdImg" name="thirdImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($rightMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $thirdHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $rightMedia }}">
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
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureThirdBox') }}" enctype="multipart/form-data">
                                        <h3>Section 3-Right Side Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="Section3Box">
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
                                                    $thirdBox = \App\Models\FeaturepageModule::where('section','Section3Box')->orderBy('id','DESC')->get();
                                                @endphp
                                                @if(count($thirdBox)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($thirdBox as $sBox)
                                                        @php
                                                            $statisticHeading  = $sBox->title;
                                                            $statisticSlogan   = $sBox->description;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $statisticHeading }}</td>
                                                            <td width="40%">{{ $statisticSlogan }}</td>
                                                            <td>
                                                                <a href="{{ route('editFeatureThirdBox',['id'=>$sBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delFeatureThirdBox',['id'=>$sBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- third section will end here -->

                                        <!-- fourth section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureSection4') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Section 4</h3>
                                            @csrf
                                            @if(!empty($section4))
                                            <input type="hidden" name="section" value="{{ $section4->section }}">
                                                @php
                                                    $fourthHeading   = $section4->title;
                                                    $fourthText      = $section4->description;
                                                    $designerText    = $section4->designerTxt;
                                                    $designerHeading = $section4->designerHeading;
                                                    $designerMedia   = $section4->designerImg;
                                                    $developerText   = $section4->developerTxt;
                                                    $developerHeading= $section4->developerHeading;
                                                    $developerMedia  = $section4->developerImg;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section4">
                                                @php
                                                    $fourthHeading  = "";
                                                    $fourthText     = "";
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
                                                        <label for="fourthHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter section headline" id="fourthHeading" value="{{ $fourthHeading }}" name="fourthHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="fourthText" class="form-label">Section Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter section text" id="fourthText" name="fourthText">{{ $fourthText }}</textarea>
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
                                        <!-- fourth section end here -->

                                        <!-- fifth section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureSection5') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Section 5</h3>
                                            @csrf
                                            @if(!empty($section5))
                                            <input type="hidden" name="section" value="{{ $section5->section }}">
                                                @php
                                                    $fifthHeading   = $section5->title;
                                                    $fifthText      = $section5->description;
                                                    $quoteMedia     = $section5->quoteImage;
                                                    $quoteText      = $section5->quote;
                                                    $quoteWriter    = $section5->quoteWriter;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="Section5">
                                                @php
                                                    $fifthHeading   = "";
                                                    $fifthText      = "";
                                                    $quoteMedia     = "";
                                                    $quoteText      = "";
                                                    $quoteWriter    = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="fifthHeading" class="form-label">Section Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter section headline" id="fifthHeading" value="{{ $fifthHeading }}" name="fifthHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="fifthText" class="form-label">Section Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter section text" id="fifthText" name="fifthText">{{ $fifthText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="developerHeading" class="form-label">Quote Heading</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter developer text" id="quoteWriter" name="quoteWriter">{{ $quoteWriter }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="quoteText" class="form-label">Quote Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter developer text" id="quoteText" name="quoteText">{{ $quoteText }}</textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        @if(!empty($quoteMedia))
                                                        <div class="row">
                                                            <img class="col-4 img-fluid" alt="{{ $developerHeading }}" src="{{ asset('/') }}public/assets/images/section/{{ $quoteMedia }}">
                                                        </div>
                                                        @endif
                                                        <label for="quoteImg" class="form-label">Quote Media</label>
                                                        <input type="file" class="form-control"  id="quoteImg" name="quoteImg">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-start">
                                                        <button type="submit" class="btn btn-primary">Save Section</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureVideoBox') }}" enctype="multipart/form-data">
                                        <h3>Section 5-Video Box</h3>
                                            @csrf
                                            <input type="hidden" name="section" value="VideoBox">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="videoHeading" class="form-label">Video Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter designer headline" id="videoHeading" name="videoHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="videoText" class="form-label">Video Text</label>
                                                        <textarea type="text" class="form-control" placeholder="Enter designer text" id="videoText" name="videoText"></textarea>
                                                    </div>
                                                </div><!--end col -->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="videoUrl" class="form-label">Video Link</label>
                                                        <input type="text" placeholder="Enter youtube video link" class="form-control"  id="videoUrl" name="videoUrl">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="videoImg" class="form-label">Video Media</label>
                                                        <input type="file" class="form-control"  id="videoImg" name="videoImg">
                                                    </div>
                                                </div><!--end col-->
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
                                                    <th>Video</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $videoBox = \App\Models\FeaturepageModule::where('section','VideoBox')->orderBy('id','DESC')->get();
                                                @endphp
                                                @if(count($videoBox)>0)
                                                        @php
                                                            $x=1;
                                                        @endphp
                                                    @foreach($videoBox as $vBox)
                                                        @php
                                                            $videoText      = $vBox->videoText;
                                                            $videoHeading   = $vBox->videoHeading;
                                                            $videoUrl       = $vBox->gridVideo;
                                                            $videoImg       = $vBox->logo;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $x }}</td>
                                                            <td>{{ $videoHeading }}</td>
                                                            <td>{{ $videoText }}</td>
                                                            <td width="30%">
                                                                @if(!empty($videoUrl))
                                                                <div class="row">
                                                                <a href="{{ $videoUrl }}" class="col-4">
                                                                    <img class="img-response" style="width:80px;height:50px" src="{{ asset('/') }}public/assets/images/section/{{ $videoImg }}" alt="$videoHeading">
                                                                </a>
                                                                </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('editFeatureVideoBox',['id'=>$vBox->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-circle-fill"></i></a>
                                                                <a href="{{ route('delFeatureVideoBox',['id'=>$vBox->id]) }}" class="btn btn-danger btn-sm"><i class=" ri-delete-bin-5-fill"></i></a>
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
                                        <!-- fifth section end here -->

                                        <!-- faq qustion section will goes here -->
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureFaqSection') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: FAQ Section</h3>
                                            @csrf
                                            @if(!empty($featureFaq))
                                            <input type="hidden" name="section" value="{{ $featureFaq->section }}">
                                                @php
                                                    $featureFaqHeading    = $featureFaq->title;
                                                    $featureFaqText       = $featureFaq->description;
                                                    $featureFaqSlogan     = $featureFaq->slogan;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="featureFaqSection">
                                                @php
                                                    $featureFaqHeading  = "";
                                                    $featureFaqText     = "";
                                                    $featureFaqSlogan   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureFaqHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="featureFaqHeading" value="{{ $featureFaqHeading }}" name="featureFaqHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureFaqSlogan" class="form-label">Slogan</label>
                                                        <input type="text" class="form-control" placeholder="Enter faq slogan" id="featureFaqSlogan" value="{{ $featureFaqSlogan }}" name="featureFaqSlogan">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureFaqText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter faq text" id="featureFaqText" name="featureFaqText">{{ $featureFaqText }}</textarea>
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
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureStartNow') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Start Now Section</h3>
                                            @csrf
                                            @if(!empty($featureStartNow))
                                            <input type="hidden" name="section" value="{{ $featureStartNow->section }}">
                                                @php
                                                    $featureStartHeading    = $featureStartNow->title;
                                                    $featureStartText       = $featureStartNow->description;
                                                    $featureStartBtnTxt     = $featureStartNow->btnTxt;
                                                    $featureStartBtnUrl     = $featureStartNow->btnUrl;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="featureStartSection">
                                                @php
                                                    $featureStartHeading  = "";
                                                    $featureStartText     = "";
                                                    $featureStartBtnTxt   = "";
                                                    $featureStartBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureStartHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="featureStartHeading" value="{{ $featureStartHeading }}" name="featureStartHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureStartText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="featureStartText" name="featureStartText">{{ $featureStartText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $featureStartBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $featureStartBtnUrl }}" name="btnUrl">
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
                                        <form class="form my-4" method="POST" action="{{ route('saveFeatureCreatedNow') }}" enctype="multipart/form-data">
                                        <h3>Feature Page: Create Account Section</h3>
                                            @csrf
                                            @if(!empty($featureCreatedNow))
                                            <input type="hidden" name="section" value="{{ $featureCreatedNow->section }}">
                                                @php
                                                    $featureCreatedNowHeading = $featureCreatedNow->title;
                                                    $featureCreatedNowText    = $featureCreatedNow->description;
                                                    $featureCreatedNowBtnTxt  = $featureCreatedNow->btnTxt;
                                                    $featureCreatedNowBtnUrl  = $featureCreatedNow->btnUrl;
                                                @endphp
                                            @else
                                            <input type="hidden" name="section" value="featureCreatedNowSection">
                                                @php
                                                    $featureCreatedNowHeading  = "";
                                                    $featureCreatedNowText     = "";
                                                    $featureCreatedNowBtnTxt   = "";
                                                    $featureCreatedNowBtnUrl   = "";
                                                @endphp
                                            @endif
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureCreatedNowHeading" class="form-label">Heading</label>
                                                        <input type="text" class="form-control" placeholder="Enter headline" id="featureCreatedNowHeading" value="{{ $featureCreatedNowHeading }}" name="featureCreatedNowHeading">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="featureCreatedNowText" class="form-label">Description</label>
                                                        <textarea class="form-control" placeholder="Enter section text" id="featureCreatedNowText" name="featureCreatedNowText">{{ $featureCreatedNowText }}</textarea>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnTxt" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" placeholder="Enter button text" id="btnTxt" value="{{ $featureCreatedNowBtnTxt }}" name="btnTxt">
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="btnUrl" class="form-label">Button URL</label>
                                                        <input type="text" class="form-control" placeholder="https://www.exampleurl.com" id="btnUrl" value="{{ $featureCreatedNowBtnUrl }}" name="btnUrl">
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
