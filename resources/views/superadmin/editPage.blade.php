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
                    <h4 class="card-title mb-0 flex-grow-1">Update Pages <small class="text-success text-sm fw-bold">@if(!empty($page)) {{ $page->pageName }} @else Page Name Not Found @endif</small></h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('defaultPage') }}" class="btn btn-info btn-sm">
                            <i class="las la-list align-middle"></i> Pages
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
                    <p class="text-muted">Update <code>page</code> using this box</p>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#newPage" role="tab" aria-selected="true">
                            <i class="las la-file"></i> Update Page
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <form method="POSt" action="{{ route('updatePage') }}" class="tab-content text-muted">
                        <div class="tab-pane active row" id="newPage" role="tabpanel">
                            <div class="col-10 mx-auto">
                                @if(!empty($page))
                                @csrf
                                <input type="hidden" name="pageId" value="{{ $page->id }}">
                                <div class="mb-3">
                                    <label for="pageName" class="form-label">Page Title</label>
                                    <input type="text" class="form-control" id="pageName" placeholder="Enter page name" value="{{ $page->pageName }}" name="pageName">
                                </div>
                                <div class="mb-3">
                                    <label for="pageUrl" class="form-label">URL</label>
                                    <div class="input-group">
                                        <div class="input-group-text">{{ url('/') }}/</div>
                                        <input type="text" class="form-control" id="pageUrl" placeholder="page-title" name="pageUrl" value="{{ $page->url }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pageContent" class="form-label">Content</label>
                                    <textarea id="pageContent" name="pageContent" class="ckeditor-classic"> {{ $page->content }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <h4>SEO Fields</h4>
                                </div>
                                <div class="mb-3">
                                    <label for="metaTitle" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle" placeholder="Enter meta title" name="metaTitle" value="{{ $page->metaTitle }}">
                                </div>
                                <div class="mb-3">
                                    <label for="metaDetails" class="form-label">Meta Details</label>
                                    <textarea class="form-control" id="metaDetails" placeholder="Enter meta details" name="metaDetails">{{ $page->metaDesc }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="keyword" class="form-label">Keyword</label>
                                    <textarea class="form-control" id="keyword" placeholder="Enter keyword" name="keyword">{{ $page->metaKeyword }}</textarea>
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
