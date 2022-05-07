@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-black-50">Create Project</h3>
    </div>

    <div class="panel-body" style="padding-left: 1cm">
                <form method="POST" action="/store">
                     @csrf
                        <div class="row">
                            <div class="col-md-6">
                                Title<input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Description<input type="text" name="description" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Deadline<input type="text" id="deadline" name="deadline" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Assigned User<select name="assigned_user" class="form-control" >
                                    <option selected disabled>select user</option>
                                    @foreach ($users as  $user)
                                    <option value="{{$user->id}}" >{{$user->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Assigned Client<select name="assigned_client" class="form-control" >
                                    <option selected disabled>select client</option>
                                    @foreach ($clients as  $client)
                                    <option value="{{$client->id}}" >{{$client->company}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Status<select name="status" class="form-control" >
                                    <option selected disabled>select status</option>
                                    <option value="open" >Open</option>
                                    <option value="close" >Close</option>
                                    </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Save</button>
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
