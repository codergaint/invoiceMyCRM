@extends('superadmin.layouts.master')
@section('title') @lang('Manage Company') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Company Management @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-3 mx-auto">
            <label class="form-label"><span class="ri-filter-line"></span> Filter Results</label>
            <form class="form-control" action="">
                <div class="mb-3">
                    <label for="package" class="form-label">Package</label>
                    <select class="form-control" id="package">
                        <option value="All">All</option>
                        <option value="Trial">Trial</option>
                        <option value="Elite">Elite</option>
                        <option value="Pro">Pro</option>
                    </select>
                </div>
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
                    <h4 class="card-title mb-0 flex-grow-1">Company <span class="text-info">{{ count($company) }}</span> <small class="text-muted text-sm">Total Companies</small></h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('languageList') }}" class="btn btn-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Manage Default Language
                        </a>
                        <a href="{{ route('newCompany') }}" class="btn btn-info btn-sm">
                            <i class="ri-add-box-line align-middle"></i> Add Company
                        </a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Language</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($company)>0)
                                @php
                                    $x=1;
                                @endphp
                                @foreach($company as $comp)
                                <tr>
                                    <td>{{ $x }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <img src="{{ asset('/') }}public/assets/images/company/{{ $comp->logo }}" alt="{{ $comp->companyName }}" class="avatar-xs rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">{{ $comp->companyName }}</div>
                                        </div>
                                    </td>
                                    <td>{{ $comp->email }}</td>
                                    <td>{{ $comp->packId }}</td>
                                    <td>{{ $comp->langId }}</td>
                                    <td>
                                        @if($comp->status=="Active")
                                        <span class="text-success">Active</span>
                                        @elseif($comp->status=="Expired")
                                        <span class="text-warning">Expired</span>
                                        @elseif($comp->status=="Register")
                                        <span class="text-muted">Register</span>
                                        @else
                                        <span class="text-danger">Block</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('editCompany',['id'=>$comp->id]) }}" class="btn btn-primary btn-sm"><i class="ri-edit-box-line"></i></a>  
                                        <a href="{{ route('delCompany',['id'=>$comp->id]) }}" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></a>    
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
