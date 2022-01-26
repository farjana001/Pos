@extends('layouts.main-layout')

@section('main_content')
<h3>Create new user</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label style="color: black;" for="name">User Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter full name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="name">Email:</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email address">
            </div>
            <div class="form-group">
                <label style="color: black;" for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('email') }}" placeholder="Enter phone number">
            </div>

            <div class="form-group">
                <label style="color: black;" for="name">Address:</label>
                <textarea type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" rows="3" placeholder="Enter address"></textarea>
            </div>


            <div class="text-right pt-3">
                <a href="{{ route('index.user.group') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Create</button>
            </div>
        </form>
    </div>
@endsection
