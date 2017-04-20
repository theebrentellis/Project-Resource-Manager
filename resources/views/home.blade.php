@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Projects</h2>
            <p><a href="/projects">Add New Project</a></p>
            <table class="table table-hover">
                <thead>
                    <th>Project Name</th>
                    <th>Build Description</th>
                    <th>Due Date</th>
                    <th>Total Build Time (Hours)</th>
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
                               {{ $project->getTotalTimeCardsTime() }}
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">     
            <h2>Developers</h2>
            <table class="table table-hover">
                <thead>
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
    <modal v-if="$store.state.modal.showModal" @close="$store.state.modal.showModal = false"></modal>
    <div class="row">
        <div class="col-md-12">
            <thebutton></thebutton>
        </div>
    </div>
    
    <calendar></calendar>
    {{var_dump($errors)}}
</div>

@endsection
