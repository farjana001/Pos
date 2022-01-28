@extends('layouts.user-detail-layout')

@section('user_content')
    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h5>
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
                            <th class="text-right">Total = {{ $invoice->items->sum('total') }}</th>
                            <th class="text-right"></th>
                        </tfoot>
                    </table>

                    <div class="text-right">
                        <button class="btn btn-info" data-toggle="modal" data-target="#addProductModal">Add Product</button>
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
                                                    <input type="text" class="form-control" name="quantity" id="prod_quantity"
                                                        placeholder="Enter product quantity">
                                                    @error('quantity')
                                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="challan_no" class="col-sm-3 col-form-label">Unit Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="price" id="prod_price"
                                                        placeholder="Enter price">
                                                    @error('price')
                                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="challan_no" class="col-sm-3 col-form-label">Total Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="total" id="price_total"
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
                </div>
            </div>
        </div>
    </div>
@endsection

