@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Project: </h2><h5>{{$project->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="/project/{{ $project->id }}/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="edit" value="editProject">
                <div class="form-group">
                    <label class="control-label" for="">Edit Project Name:</label>
                    <input class="form-control" type="text" name="editProjectTitle" value="{{$project->name}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="">Edit Project Description:</label>
                    <input class="form-control" type="text" name="editProjectDescription" value="{{$project->description}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="">Edit Due Date:</label>
                    <input class="form-control" type="date" name="editProjectDueDate" value="{{$project->dueDate}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="">Edit Build Hours:</label>
                    <input class="form-control" type="number" name="editProjectBuildHours" value="{{$project->totalHours}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Edit Project</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/project/{{ $project->id }}/edit" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="edit" value="deleteProject">
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-danger">Delete Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection