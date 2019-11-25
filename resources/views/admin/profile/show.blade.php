@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">{{ $admin->name }}<a href="{{ route('admin.dashboard') }}" class="badge badge-primary pl-4 pull-right float-right">{{ $admin->bank->name }}</a></h1>
            <p class="lead">{{ $admin->email }}</p>
            <p class="lead">{{ $admin->phone }}</p>
            <hr class="my-2">
            <p>  </p>
            <p class="lead">
                Administrator since {{ date('F d, Y', strtotime(Auth::User()->created_at)) }}
            </p>
        </div>
    </div>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">Activities todo</a>
        <a href="{{ route('profile.create') }}" class="list-group-item list-group-item-action">Add Administrator</a>
        <a href="{{ route('profile.edit',Auth::User()->id) }}" class="list-group-item list-group-item-action">Edit your account</a>
    </div>
</div>
@stop
