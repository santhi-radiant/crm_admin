@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="text-black-50">Create Client</h3>
    </div>

    <div class="panel-body" style="padding-left: 1cm">
                <form method="POST" action="/store">
                     @csrf
                        <div class="row">
                            <div class="col-md-6">
                                Company<input type="text" name="company" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                VAT<input type="text" name="vat" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Address<textarea name="address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Create</button>
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
