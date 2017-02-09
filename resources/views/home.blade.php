@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <h2>Projects</h2>
                <p><a href="/projects">Add New Project</a></p>
                    <table class="table table-hover">
                        <thead>
                            <th>Project Name</th>
                            <th>Build Description</th>
                            <th>Due Date</th>
                            <th>Build Time (Hours)</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                    <td><a href="/project/{{$project->id}}/show">{{$project->name}}</a></td>
                                    <td>{{$project->description}}</td>
                                    <td>{{date('F d, Y', strtotime($project->dueDate))}}</td>
                                    <td>{{$project->totalHours}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="row">
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
            <!--<example class="row"></example>-->
            <button id="show-modal" @click="showModal = true" class="btn btn-sm btn-success">Press Me!</button>
            <br>
            <br>
            <modal class="row" v-if="showModal" @close="showModal = false"></modal>
            <div id="calendar" class="row"></div>
            <!--<div><h6><a href="/calendar">Calendar</a></h6></div>-->
            {{var_dump($errors)}}
    </div>
</div>

@endsection
