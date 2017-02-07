@extends('layouts.app')

@section('subContent')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div>
                <p><a href="/home">Home</a></p>
            </div>
            <div>
                <h3>{{$dev->name}}</h3> 
            </div>
            <div>
                <h4>Assigned Projects</h4>
                <table class="table table-hover">
                    <thead>
                        <th>Project</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td><a href="/project/{{$project->id}}/show">{{$project->name}}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection