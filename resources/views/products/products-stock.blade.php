@extends('layouts.main-layout')

@section('main_content')
<h2>Stocks</h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Product Stock</h6>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="col-12">
                <div class="alert alert-info"  role="alert">
                {{ session('message') }}
                </div>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-basic" id="dataTable">
                    <colgroup>
                        <col style="width: 5%;">
                        <col style="width: 15%;">
                        <col style="width: 15%;">
                        <col style="width: 20%;">
                        <col style="width: 15%;">
                        <col style="width: 15%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Purchase Item</th>
                            <th class="text-center">Sale Item</th>
                            <th class="text-right pr-5">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($products as $product)
                       <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{ $product->title }}</td>
                            <td class="text-center">{{ $product->category->title }}</td>
                            <td class="text-center">{{ $product->description }}</td>
                            <td class="text-center">{{ $purchaseItems = $product->purchaseItems()->sum('quantity') }}</td>
                            <td class="text-center">{{ $saleItems = $product->salesItems()->sum('quantity') }}</td>
                            <td class="text-right pr-4">{{ $purchaseItems - $saleItems }}</td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
