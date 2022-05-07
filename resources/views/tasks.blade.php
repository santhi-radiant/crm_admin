@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <a href="/create" class="btn btn-success" style="margin-left: 0px;">Create Task</a>
        <h6 class="panel-heading" style="background-color: white; padding:1ch;">Tasks List</h6>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{$message}}</strong>
            </div>
         @endif
         <table class="table" style="background: white; padding:0%">
        <tr style="background-color:rgb(236, 234, 234);">
            <td><b>Title</b></td>
            <td><b>Description</b></td>
            <td><b>Status</b></td>
            <td><b>Duration</b></td>
            <td><b>Created At</b></td>
            <td><b>Updated At</b></td>
            <td><b>Project</b></td>
            <td><b>Assigned User</b></td>
            <td><b>Assigned Client</b></td>
            <td colspan="2"><b>Action</b></td>
        </tr>

    @foreach ($tasks as $task )
    <tr>

        <td>{{$task->title}}</td>
        <td>{{$task->description}}</td>
        <td>{{$task->status}}</td>
        <td>{{$task->duration}}</td>
        <td>{{$task->created_at}}</td>
        <td>{{$task->updated_at}}</td>

        @if($task->projects != null)
        @foreach ($task->projects as $project )
        <td> {{$project->title}} </td>
        <td>{{$project->user_id}}</td>
        <td>{{$project->client_id}}</td>
        @endforeach
        @endif

        @if($task->projects ==null)
        <td> --</td>
        <td>--</td>
        <td>--</td>
        @endif

        <td colspan="2"><a href="edit/{{$task->id}}">Edit</a> | <a href="destroy/{{$task->id}}">Delete</a></td>
    </tr>
    @endforeach

    </table>
    <div class="col-md-12">

    </div>
    </div>
@endsection
