@extends('layouts.main-layout')

@section('main_content')
<h2>Reports Overview</h2>

<div class="">
    <div class="row py-2">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($sales->sum('total', 2)) }}</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Purchases</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($purchases->sum('total', 2)) }}</div>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Receipts</div>
                            <div class="">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($receipts->sum('amount', 2)) }}</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($payments->sum('amount', 2)) }}</div>
                        </div>
                        <div class="">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Sale Reports</h6>
            <div class="">
                <form action="{{ route('sales.reports.over-view') }}" method="GET">
                    @csrf
                    <div class="form-row align-items-center">
                      <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Start Date</label>
                        <input type="date" class="form-control mb-2" id="inlineFormInput" name="start_date" value="{{ $start_date }}">
                      </div>
                      <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">End Date</label>
                        <div class="input-group mb-2">
                          <input type="date" class="form-control" id="inlineFormInputGroup" name="end_date" value="{{ $end_date }}">
                        </div>
                      </div>
                      <div class="col-auto">
                        <button type="submit" class="btn btn-primary px-5 mb-2">Filter</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th class="text-center">Product</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    {{-- {{ dd($sale) }} --}}
                    <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td class="text-center">{{ $sale->title }}</td>
                    <td class="text-right">{{ $sale->quantity }}</td>
                    <td class="text-right">{{ number_format($sale->total, 2) }}</td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th colspan="2" class=""></th>
                    <th class="text-right">Total Quantity = {{ $sales->sum('quantity') }}</th>
                    <th class="text-right">Grand Total = {{ $sales->sum('total') }}</th>
                </tfoot>
            </table>
        </div>
        </div>

        {{-- purchasereports --}}
        <div class="card-body">
            <h6 class="text-primary">Purchase Reports</h6>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th class="text-center">Product</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)

                        <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $purchase->title }}</td>
                        <td class="text-right">{{ $purchase->quantity }}</td>
                        <td class="text-right">{{ number_format($purchase->total, 2) }}</td>
                    </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="2" class=""></th>
                        <th class="text-right">Total Quantity = {{ $purchases->sum('quantity') }}</th>
                        <th class="text-right">Grand Total = {{ $purchases->sum('total') }}</th>
                    </tfoot>
                </table>
            </div>
            </div>

            {{-- Receipts report --}}

            <div class="card-body">
                <h6 class="text-primary">Receipts Reports</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Phone</th>
                                <th class="text-right">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                            {{-- {{ dd($receipt) }} --}}
                            <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{ $receipt->name }}</td>
                            <td class="text-center">{{ $receipt->phone }}</td>
                            <td class="text-right">{{ $receipt->amount }}</td>
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th colspan="3" class=""></th>
                            <th class="text-right">Total = {{ $receipts->sum('amount') }}</th>
                        </tfoot>
                    </table>
                </div>
                </div>

                              {{-- Payments report --}}

                              <div class="card-body">
                                <h6 class="text-primary">Payments Reports</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th class="text-center">User</th>
                                                <th class="text-center">Phone</th>
                                                <th class="text-right">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $payment)
                                            {{-- {{ dd($receipt) }} --}}
                                            <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td class="text-center">{{ $payment->name }}</td>
                                            <td class="text-center">{{ $payment->phone }}</td>
                                            <td class="text-right">{{ $payment->amount }}</td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th colspan="3" class=""></th>
                                            <th class="text-right">Total = {{ $payments->sum('amount') }}</th>
                                        </tfoot>
                                    </table>
                                </div>
                                </div>
                            </div>
            </div>


        </div>
    </div>



@endsection

