@extends('layouts.user-detail-layout')

@section('user_content')
    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Purchases of <span class="text-info">{{ $user->name }}</span></h5>
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
                            <th class="text-center">Challan No</th>
                            <th class="text-center pr-5">Quantity</th>
                            <th class="text-center pr-5">Total Price</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $itemTotal = 0;
                        $priceTotal = 0;
                        ?>

                        @foreach ($user->purchases as $purchase)
                        <tr>
                            <td class="text-center">{{ $purchase->date }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $purchase->challan_no }}</td>
                            <td class="text-center">
                                <?php
                                    $itemQuantity = $purchase->items()->sum('quantity');
                                    $itemTotal += $itemQuantity;
                                    echo $itemQuantity;
                                ?>
                            </td>
                            <td class="text-right">
                                <?php
                                    $itemPrice = $purchase->items()->sum('total');
                                    $priceTotal += $itemPrice;
                                    echo $itemPrice;
                                ?>
                            </td>
                            <td class="text-right pr-4">
                                <a href="{{ route('user.purchase.invoice.show', ['id' => $user->id, 'invoice_id' => $purchase->id]) }}" class="btn btn-success"><i class="far fa-eye"></i></a>

                                @if ($itemQuantity == 0)
                                <a href="{{ route('user.purchase.invoice.delete', ['id' => $user->id, 'invoice_id' => $purchase->id]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                @else
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deletePurchaseBtn">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deletePurchaseBtn" tabindex="-1" role="dialog" aria-labelledby="deletePurchaseBtnlLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deletePurchaseBtnlLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="text-center px-3">
                                               <p class="mb-0">If you want to delete the purchase invoice you have to delete the items quantity first</p>
                                           </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th colspan="3" class=""></th>
                        <th class="text-center">Total = {{ $itemTotal }}</th>
                        <th class="text-right">Total = {{ $priceTotal }}</th>
                        <th class="text-right"></th>
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
