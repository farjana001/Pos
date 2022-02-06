@extends('layouts.user-detail-layout')

@section('user_content')
    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h5>
            <a href="{{ route('user.sales', $user->id) }}" class="btn border border-secondary text-secondary"><i class="fas fa-angle-double-left"></i>&nbsp; Back</a>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div>
                <div class="d-flex justify-content-between">
                    <div class="py-2">
                        <p class="mb-1"><strong>Customer: &nbsp;</strong>{{ $user->name }}</p>
                        <p class="mb-1"><strong>Email: &nbsp;</strong>{{ $user->email }}</p>
                        <p class="mb-1"><strong>Phone: &nbsp;</strong>{{ $user->phone }}</p>
                    </div>
                    <div class="py-2 pr-5">
                        <p class="mb-1"><strong>Date: &nbsp;</strong>{{ $invoice->date }}</p>
                        <p class="mb-1"><strong>Challan No: &nbsp;</strong>{{ $invoice->challan_no }}</p>
                    </div>
                </div>

                <div class="py-2">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Sl No</th>
                                <th class="text-center">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($invoice->items as $item)
                            {{-- {{ dd($sale->id) }} --}}
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $item->product->title }}</td>
                                <td class="text-center">{{ $item->price }}</td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-right">{{ $item->total }}</td>
                                <td class="text-right pr-4">
                                    <a href="{{ route('user.sales.invoice.item.delete', ['id' => $user->id, 'invoice_id' => $invoice->id, 'item_id' => $item->id]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th colspan="4" class=""></th>
                            <th class="text-right">Total = {{ $totalPayable }}</th>
                            <th class="text-right"></th>
                        </tfoot>
                    </table>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h6 class="text-primary font-weight-bold mb-1">Paid: {{ $totalPaid }}</h6>
                            <h6 class="text-danger font-weight-bold">Due: {{ $dueAmount }}</h6>
                        </div>
                        <div class="">
                            <button class="btn btn-info" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                            <button class="btn btn-primary ml-2" data-toggle="modal" data-target="#addReceiptModal">Add Receipt</button>
                        </div>
                    </div>
                       <!-- Add Product Modal -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('user.sales.invoice.addItem', [ 'id' => $user->id, 'invoice_id' => $invoice->id]) }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 pr-0 col-form-label">Product Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="product_id" id="prod_title">
                                                            <option selected disabled value="">Select Product</option>
                                                        @foreach ($products as $product )
                                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('title')
                                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="challan_no" class="col-sm-3 col-form-label">Quantity<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input onkeyup="getTotal()" type="text" class="form-control" name="quantity" id="sale_prod_quantity"
                                                        placeholder="Enter product quantity">
                                                    @error('quantity')
                                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="challan_no" class="col-sm-3 col-form-label">Unit Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input onkeyup="getTotal()" type="text" class="form-control" name="price" id="sale_prod_price"
                                                        placeholder="Enter price">
                                                    @error('price')
                                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="challan_no" class="col-sm-3 col-form-label">Total Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input onkeyup="getTotal()" type="text" class="form-control" name="total" id="sale_price_total"
                                                        placeholder="Enter price">
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

                       <!-- Add Receipt Modal -->
                    <div class="modal fade" id="addReceiptModal" tabindex="-1" role="dialog" aria-labelledby="addReceiptModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('user.receipts.store', [ 'id' => $user->id, 'invoice_id' => $invoice->id]) }}" method="POST">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const getTotal = () => {
           let saleQuantity = document.getElementById('sale_prod_quantity').value;
           let unitSalePrice = document.getElementById('sale_prod_price').value;

           if(saleQuantity && unitSalePrice) {
            document.getElementById('sale_price_total').value = unitSalePrice * saleQuantity
           }

        }
    </script>
@endsection
