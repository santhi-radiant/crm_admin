@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-black-50">Edit Project</h3>
    </div>

    <div class="panel-body" style="padding-left: 1cm">
                <form method="POST" action="/update/{{$project->id}}">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                            Title<input type="text" name="title" value="{{$project->title}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Description<input type="text" name="description" value="{{$project->description}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Deadline<input type="datetime" name="deadline" value="{{$project->deadline}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Assigned User<select name="assigned_user" class="form-control" >
                                <option selected disabled>select user</option>
                                @foreach ($users as  $user)
                                <option value="{{$user->id}}" @if ($user->id==$project->user_id) selected @endif  >{{$user->name}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Assigned Client<select name="assigned_client" class="form-control" >
                                <option selected disabled>select client</option>
                                @foreach ($clients as  $client)
                                <option value="{{$client->id}}" @if ($client->id==$project->client_id) selected @endif  >{{$client->company}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Status<select name="status" class="form-control" >
                                <option selected disabled>select status</option>
                                <option value="open" @if ($project->status=='open') selected @endif  >Open</option>
                                <option value="close" @if ($project->status=='close') selected @endif >Close</option>
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
