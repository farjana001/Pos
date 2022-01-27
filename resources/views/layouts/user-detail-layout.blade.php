@extends('layouts.main-layout')

@section('main_content')
    <div class="mb-4 d-flex justify-content-between">
        <div>
            <a href="{{ route('users.index') }}" class="btn border-2 border-secondary font-semibold text-secondary"><i
                    class="fas fa-angle-double-left"></i>&nbsp; Back</a>
        </div>
        <div>
            <button type="button" class="btn border-2 border-primary font-semibold text-primary" data-toggle="modal" data-target="#saleModal">Add Sale</button>
            <button type="button" class="btn border-2 border-info font-semibold text-info" data-toggle="modal" data-target="#purchaseModal">Add Purchase</button>
            <button type="button" class="btn border-2 border-warning font-semibold text-warning" data-toggle="modal" data-target="#paymentModal">Add Payment</button>
            <button type="button" class="btn border-2 border-danger font-semibold text-danger" data-toggle="modal" data-target="#receiptModal">Add Receipt</button>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div><span style="font-size: 30px;" class="text-primary mr-2"><i class="fas fa-user-circle"></i></span>
                </div>
                <h4 class="m-0 font-weight-bold text-primary text-capitalize">{{ $user->name }}</h4>
            </div>
        </div>

        <div class="card-body py-5">
            <div class="row">
                <div class="col-md-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{ request()->routeIs('users.show') ? 'active' : '' }}" href="{{ route('users.show', $user->id) }}">User Info</a>
                        <a class="nav-link {{ request()->routeIs('user.sales') ? 'active' : '' }}" href="{{ route('user.sales', $user->id) }}">Sales</a>
                        <a class="nav-link {{ request()->routeIs('user.purchases') ? 'active' : '' }}" href="{{ route('user.purchases', $user->id) }}">Purchase</a>
                        <a class="nav-link {{ request()->routeIs('user.payments') ? 'active' : '' }}" href="{{ route('user.payments', $user->id) }}">Payments</a>
                        <a class="nav-link {{ request()->routeIs('user.receipts') ? 'active' : '' }}" href="{{ route('user.receipts', $user->id) }}">Reciepts</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="">
                        @yield('user_content')
                    </div>
                </div>
            </div>
        </div>


    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.payments.store', $user->id) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Add New Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date" name="date">
                                @error('date')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment_amount" class="col-sm-3 col-form-label">Amount<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="amount" id="payment_amount"
                                    placeholder="Enter amount">
                                    @error('amount')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment_note" class="col-sm-3 col-form-label">Note</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="note" id="payment_note" rows="3"
                                    placeholder="Enter note if any"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info px-4">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.receipts.store', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel">Add New Receipt</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Date<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date" name="date">
                                    @error('date')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_amount" class="col-sm-3 col-form-label">Amount<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="amount" id="payment_amount"
                                        placeholder="Enter amount">
                                        @error('amount')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_note" class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="note" id="payment_note" rows="3"
                                        placeholder="Enter note if any"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info px-4">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sales Modal -->
    <div class="modal fade" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="saleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.sales.invoice.store', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="saleModalLabel">Add New Sale Invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Date<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date" name="date">
                                    @error('date')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="challan_no" class="col-sm-3 col-form-label">Challan No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="challan_no" id="challan_no"
                                        placeholder="Enter challan no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_note" class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="note" id="payment_note" rows="3"
                                        placeholder="Enter note if any"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info px-4">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
