@extends('layouts.main-layout')

@section('main_content')
<h3>Create new Product</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label style="color: black;" for="title">Product Title:<span class="text-danger">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter product title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="category_id">Select Category:</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label style="color: black;" for="address">Description:</label>
                <textarea id="description" name="description" class="form-control" value="" placeholder="Enter product details">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label style="color: black;" for="cost_price">Cost Price:</label>
                <input type="text" id="cost_price" name="cost_price" class="form-control" value="{{ old('cost_price') }}" placeholder="Enter cost price">
                @error('cost_price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="price">Sell Price:</label>
                <input type="text" id="price" name="price" class="form-control" value="{{ old('phpne') }}" placeholder="Enter price">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="text-right pt-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Create</button>
            </div>
        </form>
    </div>
@endsection
