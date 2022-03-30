@extends('superadmin.layouts.master')
@section('title') @lang('Mail Setup') @endsection
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
@slot('title') Mail Setup @endslot
@endcomponent
@php
    if(!empty($ms)):
        $msId       = $ms->id;
        $host       = $ms->host;
        $port       = $ms->port;
        $userName   = $ms->userName;
        $password   = $ms->password;
        $encType    = $ms->encType;
        $formName   = $ms->formName;
        $formMail   = $ms->formEmail;
    else:
        $msId       = "";
        $host       = "";
        $port       = "";
        $userName   = "";
        $password   = "";
        $encType    = "";
        $formName   = "";
        $formMail   = "";
    endif;
@endphp
    <div class="row">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Email Setup <small class="text-success text-sm fw-bold">Mail Sending</small></h4>
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
                    <p class="text-muted"> <code>Mail Driver</code> Setup</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#mail" role="tab" aria-selected="true">
                            <i class="ri-mail-fill"></i> Mail
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#smtp" role="tab" aria-selected="false">
                                <i class="ri-mail-send-fill"></i> SMTP
                            </a>
                        </li> 
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <form action="{{ route('saveMail') }}" method="POST" class="tab-pane active row" id="mail" role="tabpanel">
                            @csrf
                            <input type="hidden" value="{{ $msId }}" name="msId">
                            <div class="col-7">
                                <div class="mb-3">
                                    <label for="formName" class="form-label">Mail Form Name</label>
                                    <input type="text" class="form-control" id="formName" placeholder="Enter mail form name" value="{{ $formName }}" name="formName">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="mb-3">
                                    <label for="formEmail" class="form-label">Mail Form Email</label>
                                    <input type="text" class="form-control" id="formEmail" placeholder="Enter mail form email" value="{{ $formMail }}" name="formEmail">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="text-start mt-2 col-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('saveSmtp') }}" method="POST" class="tab-pane" id="smtp" role="tabpanel">
                            @csrf
                            <input type="hidden" value="{{ $msId }}" name="msId">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="mailHost" class="form-label">Mail Host</label>
                                        <input type="text" class="form-control" id="mailHost" placeholder="Enter mail host" value="{{ $host }}" name="mailHost">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="mailPort" class="form-label">Mail Port</label>
                                        <input type="text" class="form-control" value="{{ $port }}" id="mailPort" placeholder="Enter mail port" name="mailPort">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="mailUser" class="form-label">Mail Username</label>
                                        <input type="text" class="form-control" value="{{ $userName }}" id="mailUser" placeholder="Enter username" name="mailUser">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="mailPass" class="form-label">Mail Password</label>
                                        <input type="password" class="form-control" id="mailPass" placeholder="Enter password" value="{{ $password }}" name="mailPass">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="encType" class="form-label">Mail Encription</label>
                                        <select name="encType" id="encType" class="form-control">
                                            @if(!empty($encType))
                                            <option value="{{ $encType }}">{{ $encType }}</option>
                                            @endif
                                            <option value="tls">tls</option>
                                            <option value="ssl">ssl</option>
                                            <option value="none">none</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="formName" class="form-label">Mail Form Name</label>
                                        <input type="text" class="form-control" id="formName" placeholder="Enter mail form name" value="{{ $formName }}" name="formName">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="formEmail" class="form-label">Mail Form Email</label>
                                        <input type="text" class="form-control" id="formEmail" placeholder="Enter mail form email" value="{{ $formMail }}" name="formEmail">
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="text-start mt-2 col-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
