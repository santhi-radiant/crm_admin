@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <a href="/create" class="btn btn-success" style="margin-left: 0px;">Create User</a>
        <h6 class="panel-heading" style="background-color: white; padding:1ch;">Users List</h6>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{$message}}</strong>
            </div>
         @endif
         <table class="table" style="background: white; padding:0%">
        <tr style="background-color:rgb(236, 234, 234);">
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td colspan="2"><b>Action</b></td>
        </tr>

    @foreach ($users as $user )
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td colspan="2"><a href="edit/{{$user->id}}">Edit</a> | <a href="destroy/{{$user->id}}">Delete</a></td>
    </tr>
    @endforeach

    </table>
    <div class="col-md-12">
        {!! $users->links() !!}
    </div>
    </div>
@endsection
