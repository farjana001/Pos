@extends('layouts.main-layout')

@section('main_content')
    <div class="mb-4 d-flex justify-content-between">
        <div>
            <a href="{{ route('users.index') }}" class="btn border-2 border-secondary font-semibold text-secondary"><i
                    class="fas fa-angle-double-left"></i>&nbsp; Back</a>
        </div>
        <div>
            <a href="{{ route('users.create') }}" class="btn border-2 border-primary font-semibold text-primary">Add
                Sale</a>
            <a href="{{ route('users.create') }}" class="btn border-2 border-info font-semibold text-info">Add Purchase</a>
            <a href="{{ route('users.create') }}" class="btn border-2 border-warning font-semibold text-warning">Add
                Payment</a>
            <a href="{{ route('users.create') }}" class="btn border-2 border-danger font-semibold text-danger">Add
                Receipt</a>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div><span style="font-size: 30px;" class="text-primary mr-2"><i class="fas fa-user-circle"></i></span>
                </div>
                <h4 class="m-0 font-weight-bold text-primary text-capitalize">{{ $user->name }}</h4>
            </div>
        </div>

        <div class="card-body py-5">
            <div class="row">
                <div class="col-md-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{ request()->routeIs('users.show') ? 'active' : '' }}"
                            href="{{ route('users.show', $user->id) }}">User Info</a>
                        <a class="nav-link {{ request()->routeIs('user.sales') ? 'active' : '' }}"
                            href="{{ route('user.sales', $user->id) }}">Sales</a>
                        <a class="nav-link" href="#">Purchase</a>
                        <a class="nav-link" href="#">Payments</a>
                        <a class="nav-link" href="#">Reciepts</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="">
                        @yield('user_content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
