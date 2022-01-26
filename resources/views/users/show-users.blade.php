@extends('layouts.user-detail-layout')

@section('user_content')
<div style="" class="p-3 rounded user-card d-flex justify-content-center">
    <div class="w-100">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th class="text-dark">Group:</th>
                    <td class="text-capitalize text-dark">{{ $user->group->title }}</td>
                </tr>
                <tr>
                    <th class="text-dark">Name:</th>
                    <td class="text-capitalize text-dark">{{ $user->name }}</td>
                </tr>
                <tr>
                    <th class="text-dark">Email:</th>
                    <td class="text-dark">{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="text-dark">Phone:</th>
                    <td class="text-dark">{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th class="text-dark">Address:</th>
                    <td class="text-dark">{{ $user->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
