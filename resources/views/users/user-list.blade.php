@extends('layouts.main-layout')

@section('main_content')
<h2>Users</h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">User list</h6>
            <a href="{{ route('users.create') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i class="fas fa-plus"></i>&nbsp; Add New</a>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="col-12">
                <div class="alert alert-info"  role="alert">
                {{ session('message') }}
                </div>
            </div>
            @endif
            <div class="">
                <div class="row py-2">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($sales->sum('total', 2)) }}</div> --}}
                                    </div>
                                    <div class="">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between no-gutters align-items-center">
                                    <div class="mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Purchases</div>
                                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($purchases->sum('total', 2)) }}</div> --}}
                                    </div>
                                    <div class="">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Receipts</div>
                                        <div class="">
                                            {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($receipts->sum('amount', 2)) }}</div> --}}
                                        </div>
                                    </div>
                                    <div class="">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pending Requests Card Example -->
                    <div class="col-md-3 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Payments</div>
                                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($payments->sum('amount', 2)) }}</div> --}}
                                    </div>
                                    <div class="">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-success"><i class="far fa-eye"></i></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                            @if ($user->sales()->count() == 0 && $user->purchases()->count() && $user->receipts()->count() && $user->payments()->count())
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

                                {{-- <button
                                class="btn btn-danger delete-user-modal"
                                data-toggle="modal"
                                data-target="#deleteUseruserModal"
                                data-id="{{ $user->id }}"
                                >
                                <i class="far fa-trash-alt"></i>
                                </button> --}}
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            {{-- delete modal --}}
            {{-- <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <i class="fas fa-exclamation-circle fa-5x mt-3"></i>
                            <h3 class="pt-4 mb-2 text-dark">Are you sure?</h3>
                            <p class="text-secondary">Do you really want to delete this records? This process can't be undone.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="{{ route('destroy.user.user', $user->id) }}" type="submit" id="deleteuserModalHref" class="btn btn-danger">Delete it.</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
