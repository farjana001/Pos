@extends('layouts.user-detail-layout')

@section('user_content')
    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Payments of <span class="text-info">{{ $user->name }}</span>
            </h5>
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
                            <th class="text-center">Admin</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Note</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user->payments as $payment)
                            <tr>
                                <td class="text-center">{{ $payment->date }}</td>
                                <td class="text-center">{{ optional($payment->admin)->name }}</td>
                                <td class="text-right">{{ $payment->amount }}</td>
                                <td class="text-center">{{ $payment->note }}</td>
                                <td class="text-right pr-4">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i
                                            class="far fa-edit"></i></a>
                                    <a href="{{ route('user.payments.delete', ['id' => $user->id, 'payment_id' => $payment->id]) }}" class="btn btn-danger"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th class="text-center pr-5"></th>
                        <th class="text-center"></th>
                        <th class="text-right">Total = {{ $user->payments->sum('amount') }}</th>
                        <th class="text-right pr-5"></th>
                        <th class="text-right pr-5"></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
