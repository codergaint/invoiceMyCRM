@extends('superadmin.layouts.master')
@section('title') @lang('Manage Product') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Product Management @endslot
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
        <div class="col-xl-3 mx-auto">
            <label class="form-label"><span class="ri-filter-line"></span> Filter Results</label>
            <form class="form-control" action="">
                <div class="mb-3">
                    <label for="typeOf" class="form-label">Type of</label>
                    <select class="form-control" id="typeOf">
                        <option value="All">All</option>
                        <option value="Month">Monthly</option>
                        <option value="Annual">Annual</option>
                    </select>
                </div>
                <div class="mb-2">
                    <span class="text-start"><button type="submit" class="btn btn-success">Filter Table</button></span>
                    <span class="text-end"><button type="reset" class="btn btn-primary">Reset</button></span>
                </div>
            </form>
        </div>
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Product <span class="text-info">{{ count($product) }}</span> <small class="text-muted text-sm">Total products</small></h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('newProduct') }}" class="btn btn-info btn-sm">
                            <i class="ri-add-box-line align-middle"></i> Add Product
                        </a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Annual Price</th>
                                    <th scope="col">Monthly Price</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Storage</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($product)>0)
                                @php
                                    $x=1;
                                @endphp
                                @foreach($product as $pro)
                                <tr>
                                    <td>{{ $x }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <img src="{{ asset('/') }}public/assets/images/product/{{ $pro->media }}" alt="{{ $pro->productName }}" class="avatar-xs rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">{{ $pro->productName }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $pro->annualPrice }}</td>
                                    <td>{{ $pro->monthlyPrice }}</td>
                                    <td>{{ $pro->employee }}</td>
                                    <td>{{ $pro->storage }}</td>
                                    <td>
                                        @if($pro->status=="Enable")
                                        <span class="text-success">Active</span>
                                        @else
                                        <span class="text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('editProduct',['id'=>$pro->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                        <a href="{{ route('delProduct',['id'=>$pro->id]) }}" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                    </td>
                                </tr>
                                @php
                                    $x++;
                                @endphp
                                @endforeach
                                @else
                                <tr>
                                    <td>1</td>
                                    <td>VITP</td>
                                    <td>vitp@gmail.com</td>
                                    <td>Elite</td>
                                    <td>Elite</td>
                                    <td>$520.03</td>
                                    <td><span class="text-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                        <a href="#" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>CIP</td>
                                    <td>cip@gmail.com</td>
                                    <td>Pro</td>
                                    <td>Elite</td>
                                    <td>$318.83</td>
                                    <td><span class="text-danger">Block</span></td>
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
