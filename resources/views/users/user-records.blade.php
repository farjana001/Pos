@extends('layouts.main-layout')

@section('main_content')
<h2>Users</h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">User Records</h6>
            </div>
            <div class="d-flex">
                <div class="mr-2">
                    <form action="{{ route('users.search.records') }}" method="GET" role="search">
                        @csrf
                        <div class="d-flex">
                            <input class="form-control mr-2" type="search" name="query">
                            <button class="btn border border-secondary text-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div>
                    <form action="{{ route('users.records') }}" method="GET">
                        @csrf
                        <div class="d-flex">
                            <button class="btn border border-secondary text-danger" type="submit"><i class="fas fa-sync-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center">Show details</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach ($users as $user)
                       <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->group->title }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-success"><i class="far fa-eye"></i></a>
                        </td>
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
