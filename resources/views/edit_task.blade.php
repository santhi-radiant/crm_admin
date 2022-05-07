@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-black-50">Edit Task</h3>
    </div>

    <div class="panel-body" style="padding-left: 1cm">
                <form method="POST" action="/update/{{$task->id}}">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                            Title<input type="text" name="title" value="{{$task->title}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Description<input type="text" name="description" value="{{$task->description}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Status<select name="status" class="form-control" >
                                <option selected disabled>select status</option>
                                <option value="Ready" @if ($task->status=='Ready') selected @endif  >Ready</option>
                                <option value="Inprogress" @if ($task->status=='Inprogress') selected @endif >In Progress</option>
                                <option value="Review" @if ($task->status=='Review') selected @endif >Review</option>
                                <option value="Complete" @if ($task->status=='Complete') selected @endif >Complete</option>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            Assigned Project<select name="assigned_project" class="form-control" >
                                <option selected disabled>select Project</option>
                                @foreach ($task->projects as  $project)
                                <option value="{{$project->id}}" @if ($project->id==$project->id) selected @endif>{{$project->title}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>


                        @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <strong>{{$message}}</strong>
                                    </div>

                        @endif
                </form>
    </div>
@endsection
