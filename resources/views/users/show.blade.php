@extends('layouts.main-layout')

@section('main_content')
<div class="mb-4 d-flex justify-content-between">
    <div>
        <a href="{{ route('users.index') }}" class="btn border-2 border-secondary font-semibold text-secondary"><i class="fas fa-angle-double-left"></i>&nbsp; Back</a>
    </div>
    <div>
        <a href="{{ route('users.create') }}" class="btn border-2 border-primary font-semibold text-primary">Add Sale</a>
        <a href="{{ route('users.create') }}" class="btn border-2 border-info font-semibold text-info">Add Purchase</a>
        <a href="{{ route('users.create') }}" class="btn border-2 border-warning font-semibold text-warning">Add Payment</a>
        <a href="{{ route('users.create') }}" class="btn border-2 border-danger font-semibold text-danger">Add Receipt</a>
    </div>
</div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div><span style="font-size: 30px;" class="text-primary mr-2"><i class="fas fa-user-circle"></i></span></div>
                <h4 class="m-0 font-weight-bold text-primary text-capitalize">{{ $users->name }}</h4>
            </div>
        </div>
        <div class="card-body py-5">
            <div class="row justify-content-center">
                <div class="col-xl-offset-3 col-lg-offset-1 col-md-offset-0"></div>
                <div class="col-xl-6 col-lg-10 col-md-8">
                    <div style="" class="p-3 rounded user-card d-flex justify-content-center">
                        <div class="w-100">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-dark">Group:</th>
                                        <td class="text-capitalize text-dark">{{ $users->group->title }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Name:</th>
                                        <td class="text-capitalize text-dark">{{ $users->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Email:</th>
                                        <td class="text-dark">{{ $users->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Phone:</th>
                                        <td class="text-dark">{{ $users->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-dark">Address:</th>
                                        <td class="text-dark">{{ $users->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-offset-3 col-lg-offset-1 col-md-offset-0"></div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
