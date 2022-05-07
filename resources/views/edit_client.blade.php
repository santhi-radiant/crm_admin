@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-black-50">Edit Client</h3>
    </div>

    <div class="panel-body" style="padding-left: 1cm">
                <form method="POST" action="/update/{{$client->id}}">
                     @csrf
                        <div class="row">
                            <div class="col-md-6">
                                Company<input type="text" name="company" value="{{$client->company}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                VAT<input type="text" name="vat" value="{{$client->vat}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Address<textarea name="address"  value="{{$client->address}}" class="form-control">{{$client->address}}</textarea>
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
