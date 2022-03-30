@extends('superadmin.layouts.master')
@section('title') @lang('FAQ List') @endsection
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
@slot('title') FAQ List @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Admin FAQ <small class="text-success text-sm fw-bold">Frontend</small></h4>
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
                    <p class="text-muted">Create <code>FAQ</code> using this box</p>
                    @csrf
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#newFaq" role="tab" aria-selected="true">
                            <i class="las la-file"></i> New Question
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#faqList" role="tab" aria-selected="false">
                                <i class="las la-list"></i> FAQ List
                            </a>
                        </li> 
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane" id="faqList" role="tabpanel">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="table-responsive mt-3 mb-1">
                                        <table class="table align-middle" id="customerTable">
                                            <thead class="table-light">
                                                <th>Question</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @if(count($faq)>0)
                                                @php
                                                    $x=1;
                                                @endphp
                                                @foreach($faq as  $f)
                                                <tr>
                                                    <td>{{ $f->question }}</td>
                                                    <td>
                                                        <a href="{{ route('editFaq',['id'=>$f->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                                        <a href="{{ route('delFaq',['id'=>$f->id]) }}" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                                    </td>
                                                </tr>
                                                @php
                                                    $x=1;
                                                @endphp
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td>What is MyCRM?</td>
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
                        <form action="{{ route('saveFaq') }}" method="POST" class="tab-pane active row" id="newFaq" role="tabpanel">
                            @csrf
                            <div class="col-10 mx-auto">
                                <div class="mb-3">
                                    <label for="question" class="form-label">Question</label>
                                    <input type="text" class="form-control" id="question" placeholder="Enter FAQ question" name="question">
                                </div>
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
                                    <textarea id="answer" name="answer" class="ckeditor-classic"></textarea>
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
