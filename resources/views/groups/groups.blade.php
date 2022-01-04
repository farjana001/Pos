@extends('layouts.main-layout')

@section('main_content')
<h2>User Groups </h2>

    <!-- DataTbales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">User group list</h6>
            <a href="{{ route('create.user.group') }}" class="btn btn-warning font-weight-bold" style="color:black;"><i class="fas fa-plus"></i>&nbsp; Add New</a>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Status</th>
                            <th class="text-right pr-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($groups as $group)
                       <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-center">{{ $group->title }}</td>
                        <td class="text-center">
                            @if ($group->status === 1)
                            <span class="text-success">Active</span>
                            @elseif ($group->status === 2)
                            <span class="text-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="text-right pr-4">
                            <button class="btn btn-info"><i class="far fa-edit"></i></button>
                                <a href="{{ route('destroy.user.group', $group->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                {{-- <button
                                class="btn btn-danger delete-group-modal"
                                data-toggle="modal"
                                data-target="#deleteUserGroupModal"
                                data-id="{{ $group->id }}"
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
            <div class="modal fade" id="deleteUserGroupModal" tabindex="-1" role="dialog"
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
                            <a href="{{ route('destroy.user.group', $group->id) }}" type="submit" id="deleteGroupModalHref" class="btn btn-danger">Delete it.</a>
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
