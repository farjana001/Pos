@extends('layouts.main-layout')

@section('main_content')
<h3>Create User Group</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('store.user.group') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label style="color: black;" for="group_title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter group title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="group_status">Status:</label>
                <select class="form-control" name="status" id="group_status">
                    <option disabled selected value="">Selec status</option>
                    <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                    <option {{ old('status') == 2 ? 'selected' : '' }} value="2">Inactive</option>
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-right pt-3">
                <a href="{{ route('index.user.group') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Create</button>
            </div>
        </form>
    </div>
@endsection
