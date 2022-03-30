@extends('superadmin.layouts.master')
@section('title') @lang('General Settings') @endsection
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
@slot('title') General Settings @endslot
@endcomponent
@php
    if(!empty($gs)):
        $gsId           = $gs->id;
        $companyName    = $gs->companyName;
        $email          = $gs->email;
        $phone          = $gs->phone;
        $website        = $gs->website;
        $currency       = $gs->currency;
        $language       = $gs->language;
        $timezone       = $gs->timezone;
        $generalLogo    = $gs->randLogo;
        $favicon        = $gs->favicon;
        $frontLogo      = $gs->frontLogo;
        $address        = $gs->address;
    else:
        $gsId           = "";
        $companyName    = "";
        $email          = "";
        $phone          = "";
        $website        = "";
        $currency       = "";
        $language       = "";
        $timezone       = "";
        $generalLogo    = "";
        $favicon        = "";
        $frontLogo      = "";
        $address        = "";
    endif;
@endphp
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Genereal Settings <small class="text-success text-sm fw-bold">Frontend</small></h4>
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
                    <p class="text-muted">Manage <code>General Settings</code> using this box</p>
                    @csrf

                    <form action="{{ route('saveGeneralSettings') }}" method="POST" class="row" id="newFaq" role="tabpanel">
                        @csrf
                        <input type="hidden" name="gsId" value="{{ $gsId }}">
                        <div class="col-md-6 mx-auto">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="question" placeholder="Enter company name" value="{{ $companyName }}" name="companyName">
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="question" placeholder="Enter email of the company" value="{{ $email }}" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="question" placeholder="Enter phone number of the company" value="{{ $phone }}" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="question" placeholder="Enter company location address" name="address"> {{ $address }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="mb-3">
                                <label for="language" class="form-label">Language</label>
                                <select class="form-control" name="language">
                                    @php
                                        $languageList = \App\Models\Language::all();
                                        $singleLang = \App\Models\Language::find($language);
                                    @endphp
                                    @if(!empty($singleLang)>0)
                                        <option value="{{ $singleLang->id }}">{{ $singleLang->language }}</option>
                                    @endif
                                    @if(count($languageList)>0)
                                        @foreach($languageList as $lang)
                                        <option value="{{ $lang->id }}">{{ $lang->language }}</option>
                                        @endforeach
                                    @else
                                        <option value="0">Bangla</option>
                                        <option value="0">English</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <select class="form-control" name="currency">
                                    @php
                                        $currencyList = \App\Models\Currency::all();
                                        $singCurr = \App\Models\Currency::find($currency);
                                    @endphp
                                    @if(!empty($singCurr)>0)
                                        <option value="{{ $singCurr->id }}">{{ $singCurr->currency }}</option>
                                    @endif
                                    @if(count($currencyList)>0)
                                        @foreach($currencyList as $curr)
                                        <option value="{{ $curr->id }}">{{ $curr->currency }}</option>
                                        @endforeach
                                    @else
                                        <option value="0">USD</option>
                                        <option value="0">GBP</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="timeZone" class="form-label">Time Zone</label>
                                <select class="form-control" name="timeZone" id="timeZone">
                                    @if(!empty($timezone))
                                    <option value="{{ $timezone }}">{{ $timezone }}</option>
                                    @endif
                                    <option value="UTC+3">UTC+3</option>
                                    <option value="UTC+2">UTC+2</option>
                                    <option value="UTC+1">UTC+1</option>
                                    <option value="UTC+0">UTC+0</option>
                                    <option value="UTC">UTC</option>
                                    <option value="UTC-0">UTC-0</option>
                                    <option value="UTC-1">UTC-1</option>
                                    <option value="UTC-2">UTC-2</option>
                                    <option value="UTC-3">UTC-3</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-start mt-4 col-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <!-- Update general logo of the site -->
                    <form action="{{ route('updateGenLogo') }}" class="form mt-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="gsId" value="{{ $gsId }}">
                        <input type="hidden" name="companyName" value="{{ $companyName }}">
                        <div class="row">
                            <div class="col-12 my-4">
                                <h4 class="card-title mb-2 flex-grow-1">General Logo Update</h4>
                            </div>
                            <div class="col-4 my-3">
                                <img class="img-fluid" src="@if(!empty($generalLogo)) {{ asset('/public/assets/images/logo/'.$generalLogo) }} @else {{ asset('/public/assets/images/logo-dark.png') }} @endif" alt="General Logo">
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="randLogo" class="form-label">New Logo</label>
                                <input type="file" name="randLogo" class="form-control" id="randLogo" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- Update frontend logo of the site -->
                    <form action="{{ route('updateFrontLogo') }}" class="form mt-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="gsId" value="{{ $gsId }}">
                        <input type="hidden" name="companyName" value="{{ $companyName }}">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h4 class="card-title mb-2 flex-grow-1">Frontend Logo</h4>
                            </div>
                            <div class="col-4 mb-4">
                                <img class="img-fluid" src="@if(!empty($frontLogo)) {{ asset('/public/assets/images/logo/'.$frontLogo) }} @else {{ asset('/public/assets/images/logo-dark.png') }} @endif" alt="Frontend Logo">
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-6 mb-4">
                                <label for="frontLogo" class="form-label">New Logo</label>
                                <input type="file" name="frontLogo" class="form-control" id="frontLogo" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- Update favicon of the site -->
                    <form action="{{ route('updateFavicon') }}" class="form mt-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="gsId" value="{{ $gsId }}">
                        <input type="hidden" name="companyName" value="{{ $companyName }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4 class="card-title mb-4 flex-grow-1">Favicon Update</h4>
                            </div>
                            <div class="col-md-2 col-4 mb-4">
                                <img class="img-fluid" src="@if(!empty($favicon)) {{ asset('/public/assets/images/logo/'.$favicon) }} @else {{ asset('/public/assets/images/logo-sm.png') }} @endif" alt="Frontend Logo">
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-6 mb-4">
                                <label for="favicon" class="form-label">New Logo</label>
                                <input type="file" name="favicon" class="form-control" id="favicon" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update</button>
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
