@extends('superadmin.layouts.master')
@section('title') @lang('Update Page') @endsection
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
@slot('title') Update Page @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Faq <small class="text-success text-sm fw-bold">Frontend</small></h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('faqList') }}" class="btn btn-info btn-sm">
                            <i class="las la-list align-middle"></i> Faq List
                        </a>
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
                    <p class="text-muted">Update <code>FAQ</code> using this box</p>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#newPage" role="tab" aria-selected="true">
                            <i class="las la-list"></i> Update FAQ
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <form method="POSt" action="{{ route('updateFaq') }}" class="tab-content text-muted">
                        <div class="tab-pane active row" id="newPage" role="tabpanel">
                            <div class="col-10 mx-auto">
                                @if(!empty($faq))
                                @csrf
                                <input type="hidden" name="faqId" value="{{ $faq->id }}">
                                <div class="mb-3">
                                    <label for="question" class="form-label">Page Title</label>
                                    <input type="text" class="form-control" id="question" placeholder="Enter FAQ question" value="{{ $faq->question }}" name="question">
                                </div>
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
                                    <textarea id="answer" name="answer" class="ckeditor-classic"> {{ $faq->answer }}</textarea>
                                </div>
                                <div class="text-start mt-4 col-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                @else
                                    <div class="alert alert-info">Sorry! No data found</div>
                                @endif
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
