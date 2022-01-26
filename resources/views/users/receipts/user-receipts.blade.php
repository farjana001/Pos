@extends('layouts.user-detail-layout')

@section('user_content')
    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Receipts of <span class="text-info">{{ $user->name }}</span></h5>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center pr-5">Date</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Note</th>
                            <th class="text-center pr-5">Total Price</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user->receipts as $receipt)
                        <tr>
                            <td class="text-center">{{ $receipt->date }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $receipt->amount }}</td>
                            <td class="text-center">{{ $receipt->note }}</td>
                            <td class="text-center">300</td>
                            <td class="text-right pr-4">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i
                                        class="far fa-edit"></i></a>
                                <a href="{{ route('user.receipts.delete', ['id' => $user->id, 'receipt_id' => $receipt->id]) }}" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <!-- Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.receipts.store', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel">Add Payment</h5>
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
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
