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
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#newPage" role="tab" aria-selected="true">
                            <i class="las la-file"></i> New Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#defaultPage" role="tab" aria-selected="false">
                                <i class="las la-list"></i> Default Pages
                            </a>
                        </li> 
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane" id="defaultPage" role="tabpanel">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="table-responsive mt-3 mb-1">
                                        <table class="table align-middle" id="customerTable">
                                            <thead class="table-light">
                                                <th>Page Name</th>
                                                <th>URL</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @if(count($page)>0)
                                                @php
                                                    $x=1;
                                                @endphp
                                                @foreach($page as  $p)
                                                <tr>
                                                    <td>{{ $p->pageName }}</td>
                                                    <td><input type="text" class="form-control" value="https://www.creativeitpark.com/{{ $p->url }}" readonly></td>
                                                    <td>
                                                        <a href="{{ route('editPage',['id'=>$p->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                                        <a href="{{ route('delPage',['id'=>$p->id]) }}" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                                    </td>
                                                </tr>
                                                @php
                                                    $x=1;
                                                @endphp
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td>Example Page</td>
                                                    <td><input type="text" class="form-control" value="https://www.creativeitpark.com/example-page" readonly></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                                        <a href="#" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('savePage') }}" method="POST" class="tab-pane active row" id="newPage" role="tabpanel">
                            @csrf
                            <div class="col-10 mx-auto">
                                <div class="mb-3">
                                    <label for="pageName" class="form-label">Page Title</label>
                                    <input type="text" class="form-control" id="pageName" placeholder="Enter page name" name="pageName">
                                </div>
                                <div class="mb-3">
                                    <label for="pageUrl" class="form-label">URL</label>
                                    <div class="input-group">
                                        <div class="input-group-text">{{ url('/') }}/</div>
                                        <input type="text" class="form-control" name="pageUrl" id="pageUrl" placeholder="page-title">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pageContent" class="form-label">Content</label>
                                    <textarea id="pageContent" name="pageContent" class="ckeditor-classic"></textarea>
                                </div>
                                <div class="mb-3">
                                    <h4>SEO Fields</h4>
                                </div>
                                <div class="mb-3">
                                    <label for="metaTitle" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="metaTitle" placeholder="Enter meta title" name="metaTitle">
                                </div>
                                <div class="mb-3">
                                    <label for="metaDetails" class="form-label">Meta Details</label>
                                    <textarea class="form-control" id="metaDetails" placeholder="Enter meta details" name="metaDetails"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="keyword" class="form-label">Keyword</label>
                                    <textarea class="form-control" id="keyword" placeholder="Enter keyword" name="keyword"></textarea>
                                </div>
                                <div class="text-start mt-4 col-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
