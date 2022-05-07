@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-black-50">Create Task</h3>
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
                                Assigned Project<select name="assigned_project" class="form-control" >
                                    <option selected disabled>select project</option>
                                    @foreach ($projects as  $project)
                                    <option value="{{$project->id}}" >{{$project->title}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                Status<select name="status" class="form-control" >
                                    <option selected disabled>select status</option>
                                    <option value="Ready" >Ready</option>
                                    <option value="Inprogress" >In Progress</option>
                                    <option value="Review" >Review</option>
                                    <option value="Complete" >Complete</option>
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
