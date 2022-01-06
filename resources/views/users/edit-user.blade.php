@extends('layouts.main-layout')

@section('main_content')
<h3>Update <strong><span class="text-primary">{{ $users->name }}</span></strong>'s information</h3>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4 p-5 w-75">
        <form action="{{ route('users.update', $users->id) }}" enctype="multipart/form-data" method="POST">

            @csrf
            <div class="form-group">
                <label style="color: black;" for="name">User Name:<span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ isset($users) ? $users->name : '' }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="group_id">Select Group:<span class="text-danger">*</span></label>
                <select class="form-control" name="group_id" id="group">
                    <option value="">Select group</option>
                    @foreach($groups as $group)
                    <option value="{{ $group->id }}" @if($users->group_id === $group->id) selected='selected' @endif> {{ $group->title }}</option>
                @endforeach
                </select>
                @error('group_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="name">Email:<span class="text-danger">*</span></label>
                <input type="text" id="email" name="email" class="form-control" value="{{ isset($users) ? $users->email : '' }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label style="color: black;" for="phone">Phone:<span class="text-danger">*</span></label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ isset($users) ? $users->phone : '' }}">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label style="color: black;" for="name">Address:</label>
                <textarea type="text" id="address" name="address" class="form-control" rows="3">{{ isset($users) ? $users->address : '' }}</textarea>
            </div>


            <div class="text-right pt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary px-5">Go Back</a>
                <button type="submit" class="btn btn-success px-5">Update</button>
            </div>
        </form>
    </div>
@endsection
