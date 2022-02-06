@extends('layouts.main-layout')

@section('main_content')
@if(session()->has('message'))
<div class="col-12">
  <div class="alert alert-success" role="alert">
    {{ session()->get('message') }}
  </div>
</div>
@endif
{{-- {{ dd($user) }} --}}
    <!-- Content Row -->
    <div class="row py-2">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between no-gutters align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStock }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Sales</div>
                            <div class="">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalSales }}</div>
                            </div>
                        </div>
                        <div class="">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Purchases</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPurchases }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <?php

        ?>
        <div class="col-md-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between  align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Receipts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReceipts }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between  align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPayments }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between  align-items-center">
                        <div class="mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReceipts - $totalPayments }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
