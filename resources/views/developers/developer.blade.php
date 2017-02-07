@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Engineers</h1>
            <a href="/home"><p>Back</p></a>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-8 col-md-offset-2">

            <h3>Add A New Engineer</h3>
            <form method="POST" action="/engineers">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="newEngineerName" value="" placeholder="New Developer Name" class="form-control" width="50%">
                <br>
                <input type="number" name="newEngineerTotalHours" value="" placeholder="Total Hours Available" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary">Create New Engineer</button>
            </form>
        </div>
    </div>
</div>

@endsection