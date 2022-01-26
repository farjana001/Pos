@extends('layouts.main-layout')

@section('main_content')
<h3>Update User Group</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('update.user.group', $groups->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label style="color: black;" for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ isset($groups) ? $groups->title : '' }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="status">Status:</label>
                <select class="form-control" name="status" id="status">
                    <option disabled selected value="">Selec status</option>
                    @isset($groups)
                    <option {{ $groups->status == 1 ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $groups->status == 2 ? 'selected' : '' }} value="2">Inactive</option>
                    @endisset
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-right pt-3">
                <a href="{{ route('index.user.group') }}" class="btn btn-secondary px-5">Cancel</a>
                <button type="submit" class="btn btn-success px-5">Update</button>
            </div>
        </form>
    </div>
@endsection
