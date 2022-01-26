@extends('layouts.main-layout')

@section('main_content')
@if(session()->has('message'))
<div class="col-12">
  <div class="alert alert-success" role="alert">
    {{ session()->get('message') }}
  </div>
</div>
@endif
{{-- {{ dd($user) }} --}}
<h3>Welcome to the dashboard</h3>
@endsection
