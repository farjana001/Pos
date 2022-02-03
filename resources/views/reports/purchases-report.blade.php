@extends('layouts.main-layout')

@section('main_content')
<h2>Reports</h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Purchase Reports</h6>
            <div class="">
                <form action="{{ route('purchases.reports') }}" method="GET">
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
                            <th class="text-right">Price</th>
                            <th class="text-right">Total</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($purchases as $purchase)
                       {{-- {{ dd($purchase) }} --}}
                       <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $purchase->title }}</td>
                        <td class="text-right">{{ $purchase->quantity }}</td>
                        <td class="text-right">{{ $purchase->price }}</td>
                        <td class="text-right">{{ $purchase->total }}</td>
                        <td class="text-center">{{ $purchase->date }}</td>
                    </tr>
                       @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="2" class=""></th>
                        <th class="text-right">Total Quantity = {{ $purchases->sum('quantity') }}</th>
                        <th class="text-right"></th>
                        <th class="text-right">Grand Total = {{ $purchases->sum('total') }}</th>
                        <th class="text-right"></th>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>

@endsection

