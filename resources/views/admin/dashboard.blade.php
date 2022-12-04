@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @if(session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
    @endif
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">

            </div>
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-semibold d-block mb-4">Total Orders</h4>
                                <h2 class="card-title my-3">{{ $totalOrder }}</h2>
                                <a href="{{ url('admin/order') }}">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-semibold d-block mb-4">Today Orders</h4>
                                <h2 class="card-title my-3">{{ $todayOrder }}</h2>
                                <a href="{{ url('admin/order') }}">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-semibold d-block mb-4">This Month Orders</h4>
                                <h2 class="card-title my-3">{{ $thisMonthOrder }}</h2>
                                <a href="{{ url('admin/order') }}">view</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-semibold d-block mb-4">This Year Orders</h4>
                                <h2 class="card-title my-3">{{ $thisYearOrder }}</h2>
                                <a href="{{ url('admin/order') }}">view</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

