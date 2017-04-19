@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Projects</h1>
            <a href="/home"><p>Back</p></a>
            <ul>
                @foreach ($projects as $project)
                <li><a href="/project/{{$project->id}}/show">{{$project->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h3>Add A New Project</h3>
            
            <form method="POST" action="/projects">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" name="newProjectName" value="" placeholder="New Project Title" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="newProjectDescription" value="" placeholder="Description" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="newProjectHours" value="" placeholder="Client Quoted Estimated Hours" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="projectDueDate" class="control-label">Due Date: <input type="date" class="form-control" id="projectDueDate" name="newProjectDueDate"></label>
                </div>
                <button type="submit" class="btn btn-primary">Create New Project</button>
            </form>
        </div>
    </div>
</div>


@endsection