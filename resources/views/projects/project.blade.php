@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-md-8 col-md-offset-2">
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
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Add A New Project</h3>
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
                            <label for="projectDueDate" class="col-form-label">Due Date:</label>
                            <input type="date" class="form-control col-4" id="projectDueDate" name="newProjectDueDate">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create New Project</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection