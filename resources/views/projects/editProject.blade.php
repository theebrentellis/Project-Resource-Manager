@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Project Name: </h2><h5>{{$project->name}}</h5>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="/project/edit">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="editProjectId" value="{{$project->id}}">
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
    <button type="button" class="btn btn-sm btn-danger">Delete Project</button>
</div>

@endsection