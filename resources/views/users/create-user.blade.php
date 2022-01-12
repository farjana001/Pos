@extends('layouts.main-layout')

@section('main_content')
<h3>Create new user</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label style="color: black;" for="name">User Name:<span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter full name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="group_id">Select Group:<span class="text-danger">*</span></label>
                <select class="form-control" name="group_id" id="group">
                    <option value="">Select group</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                    @endforeach
                </select>
                @error('group_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="name">Email:<span class="text-danger">*</span></label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email address">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="phone">Phone:<span class="text-danger">*</span></label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter phone number">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label style="color: black;" for="name">Address:</label>
                <textarea type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" rows="3" placeholder="Enter address">{{ old('address') }}</textarea>
            </div>


            <div class="text-right pt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Create</button>
            </div>
        </form>
    </div>
@endsection
