@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <h3>{{$project->name}}</h3><a href="/project/{{ $project->id }}/edit">Edit Project</a>
            </div>
            <div>
                <ul>
                    <li><strong>Description:</strong> {{ $project->description }}</li>
                    <li><strong>Due:</strong> {{ date('F d, Y', strtotime($project->dueDate)) }}</li>
                    <li><strong>Build Hours:</strong> {{ $project->totalHours }}</li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Project Timecards</h4>
            <a href="#" id="editTimecard">Edit Timecard</a>
        </div>
    </div>
    <div class="row">
        @foreach($timecards as $timecard)
                <div class="col-3">
                    <form action="/timecards/{{ $timecard->id }}/edit" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" class="form-check-input timecardCheckbox" id="" onChange="submit();">
                        <input type="hidden" name="edit" value="edit">
                    </form>
                    <div class="card">
                        <div class="card-header">
                            {{ $timecard->user->name }}
                        </div>
                        <div class="card-block">
                            <p class="card-text"><strong>Role: </strong>{{ $timecard->role->label }}</p>
                            <p class="card-text"><strong>Time: </strong>{{ $timecard->time }}</p>
                            <p class="card-text"><strong>Description: </strong>{{ $timecard->notes }}</p>
                            @if($timecard->completed)
                                <button class="btn btn-outline-success btn-sm" disabled><i class="fa fa-fw fa-btn fa-check-square-o"></i>Completed</button>
                            @else
                                <form id="" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="completed" value="1">
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-btn fa-check-square-o"></i>Complete Timecard</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>

@endsection