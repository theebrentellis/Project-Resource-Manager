@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="#" id="editTimecard">Edit Timecard</a>
        </div>
    </div>
    <div class="row">
        @foreach($timecards as $timecard)
            <div class="col-3">
                <form id="editTimecardForm" action="/timecards/{{ $timecard->id}}/edit" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" class="form-check-input timecardCheckbox" id="" onChange="submit();">
                    <input type="hidden" name="edit" value="edit">
                </form>
                <div class="card">
                    <div class="card-header">
                        <p class="card-title"><strong>{{ $timecard->project->name }}</strong></p>
                        <p class="card-text">{{ date('F d', strtotime($timecard->date)) }}</p>
                    </div>
                    <div class="card-block">
                        <p class="card-text"><strong>{{ $timecard->user->name }}</strong></p>
                        <p class="card-text"><strong>Role: </strong>{{ $timecard->role->label }}</p>
                        <p class="card-text"><strong>Time: </strong>{{ $timecard->time }}</p>
                        <p class="card-text"><strong>Notes: </strong>{{ $timecard->notes }}</p>
                        @if($timecard->completed == 0)
                            <form id="timecardCompleteForm" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="timecard_id" value="{{ $timecard->id }}">
                                <input type="hidden" name="completed" value='1'>
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-btn fa-check-square-o"></i>Complete Timecard</button>
                            </form>
                        @else
                            <button class="btn btn-outline-success btn-sm" disabled><i class="fa fa-fw fa-btn fa-check-square-o"></i>Completed</button>
                            <form id="" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="timecard_id" value="{{ $timecard->id }}">
                                <input type="hidden" name="completed" value='false'>
                                <a href="#" onclick="submit();" style="font-size: 10px;">Undo</a>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--<div class="row">
        <a href="#" onclick="console.log(document.getElementById('editTimecardForm'))">Click Me!</a>
        <ul>
            @foreach($timecards as $timecard)
            <li>{{ $timecard->project->name }}</li>
            @endforeach
        </ul>
    </div>-->
</div>
@endsection