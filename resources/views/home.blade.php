@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col col-md-12">
            <div>
                <div class="card card-inverse" style="background-color: #333; border-color: #333;">
                    <div class="card-block">
                        <h2 class="card-title">Projects</h2>
                        <a href="/projects" class="btn btn-outline-secondary btn-sm" role="button">
                            <i class="fa fa-fw fa-btn fa-plus"></i>Add New Project
                        </a>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead class="thead-default">
                            <th>Project Name</th>
                            <th>Build Description</th>
                            <th>Due Date</th>
                            <th>Total Build Time</th>
                            <th>Assigned Hours</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                    <td><a href="/project/{{$project->id}}/show">{{$project->name}}</a></td>
                                    <td>{{$project->description}}</td>
                                    <td>{{date('F d, Y', strtotime($project->dueDate))}}</td>
                                    <td>{{$project->totalHours}}</td>
                                    <td>
                                    {{ $project->getProjectAssignedTime() }}
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12">
            <div class="card">
                <div class="card-block">
                    <h2 class="card-title">Developers</h2>
                    <table class="table">
                        <thead class="thead-default">
                            <th>Name</th>
                            <th>Total Assigned Hours</th>
                        </thead>
                        <tbody>
                            @foreach ($developers as $developer)
                            <tr>
                                <td><a href="/developer/{{$developer->id}}/show">{{$developer->name}}</a></td>
                                <td>{{$developer->totalHours}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <modal v-if="$store.state.modal.showModal" @close="$store.state.modal.showModal = false"></modal>
    <div class="row">
        <div class="col">
            <thebutton></thebutton>
        </div>
    </div>
    
    <calendar></calendar>
    {{var_dump($errors)}}
</div>

@endsection
