@extends('layouts.main-layout')

@section('main_content')
<h2>Users</h2>
    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">User list</h6>
            </div>
            <div class="d-flex">
                <div class="mr-2">
                    <form action="{{ route('users.search') }}" method="GET" role="search">
                        @csrf
                        <div class="d-flex">
                            <input class="form-control mr-2" type="search" name="query">
                            <button class="btn border border-secondary text-success" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div>
                    <form action="{{ route('users.index') }}" method="GET">
                        @csrf
                        <div class="d-flex">
                            <button class="btn border border-secondary text-danger" type="submit"><i class="fas fa-sync-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
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
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Group</th>
                            <th class="text-center">Email</th>
                            <th class="text-center pr-5">Phone</th>
                            <th class="text-center pr-5">Address</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach ($users as $user)
                       <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->group->title }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->phone }}</td>
                        <td class="text-center">{{ $user->address }}</td>
                        <td class="text-right pr-4">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                            @if (
                                 $user->sales()->count()        == 0    &&
                                 $user->purchases()->count()    == 0    &&
                                 $user->receipts()->count()     == 0    &&
                                 $user->payments()->count()     == 0
                                 )
                            <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            @else
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">
                                <i class="far fa-trash-alt"></i>
                            </button>
                             <!-- Modal -->
                             <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteUserlLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserlLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="text-center px-3">
                                           <p class="mb-0">If you want to delete the user, you have to delete the sales, payment, receipt and purchase first</p>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            @endif
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
