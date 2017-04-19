@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div>
                <p><a href="/home">Home</a></p>
            </div>
            <div>
                <h6>Returned Project Information</h6>
                <p>{{$project}}</p>
            </div>

            <div>
                <h3>{{$project->name}}</h3><a href="/project/{{$project->id}}/edit"><p>Edit</p></a>
            </div>
            <div>
                <ul>
                    <li>{{$project->description}}</li>
                    <li>{{$project->dueDate}}</li>
                    <li>{{$project->totalHours}}</li>
                </ul>
                <h6>Assigned Developers</h6>
                <ul>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection