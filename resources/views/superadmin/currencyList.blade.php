@extends('superadmin.layouts.master')
@section('title') @lang('Manage Currency') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Currency Management @endslot
@endcomponent
    <div class="row">
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
        <div class="col-xl-7 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Currency</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Generate Report
                        </button>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">      
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">#</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col">Short Code</th>
                                    <th scope="col">Symble</th>
                                    <th scope="col">RTL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($currency))
                                @php
                                    $x=1;
                                @endphp
                                @foreach($currency as $curr)
                                <tr>
                                    <td>{{ $x }}</td>
                                    <td>{{ $curr->currency }}</td>
                                    <td>{{ $curr->shortCode }}</td>
                                    <td>{{ $curr->symble }}</td>
                                    <td>{{ $curr->rtl }}</td>
                                    <td>@if($curr->status=='Enable')<i class="las la-toggle-on text-success"></i>@else <i class="las la-toggle-off text-muded"></i>@endif</td>
                                    <td>
                                        <a href="{{ route('editCurrency',['id'=>$curr->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                        <a href="{{ route('delCurrency',['id'=>$curr->id]) }}" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                    </td>
                                </tr>
                                @php
                                $x++;
                                @endphp
                                @endforeach
                                @else
                                <tr>
                                    <td>1</td>
                                    <td>USD</td>
                                    <td>usd</td>
                                    <td>$</td>
                                    <td>Off</td>
                                    <td><i class="las la-toggle-off text-muded"></i></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>GBP</td>
                                    <td>gbp</td>
                                    <td>$</td>
                                    <td>On</td>
                                    <td><i class="las la-toggle-on text-success"></i></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                    </td>
                                </tr>
                                @endif
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div>
            </div> <!-- .card--><div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Set default currency for the system</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm">
                                    <i class="ri-file-list-3-line align-middle"></i> Set Default
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="rtl" class="form-label">Default Currency</label>
                                    <select  class="form-select" id="rtl">
                                        <option value="usd">USD</option>
                                        <option value="gbp">GBP</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Set Default Currency</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- .card-->
                </div>
            </div>
            <div class="mb-4">
                <a href="{{ route('newCurrency') }}" class="btn btn-success btn-sm">New Currency</a> 
            </div>
            
        </div> <!-- .col-->
        
        <div class="col-xl-5 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Currency</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Save Data
                        </button>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('saveCurrency') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="currencyName" class="form-label">Currency Name</label>
                            <input type="text" class="form-control" name="currencyName" id="currencyName" placeholder="Enter currency name">
                        </div>
                        <div class="mb-3">
                            <label for="shortName" class="form-label">Short Name</label>
                            <input type="text" class="form-control" id="shortName" placeholder="Enter language short name" name="shortName">
                        </div>
                        <div class="mb-3">
                            <label for="symble" class="form-label">Symble</label>
                            <input type="text" class="form-control" id="symble" placeholder="Enter currency symble" name="symble">
                        </div>
                        <div class="mb-3">
                            <label for="currStatus" class="form-label">Status</label>
                            <select class="form-control" name="currStatus" id="currStatus">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rtl" class="form-label">RTL</label>
                            <select  class="form-control" name="rtl" id="rtl">
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save Data</button>
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
<script src="{{ asset('public/assets/js/app.min.js') }}"></script>
@endsection
