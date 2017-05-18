@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach($timecards as $timecard)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title"><strong>{{ $timecard->project->name }}</strong></p>
                        <p class="card-text">{{ date('F d', strtotime($timecard->date)) }}</p>
                    </div>
                    <div class="card-block">
                        <p class="card-text">{{ $timecard->role->label }}: {{ $timecard->user->name }}</p>
                        <h6 class="card-text">Time: {{ $timecard->time }}</h6>
                        <p class="card-text">{{ $timecard->notes}}</p>
                        @if($timecard->completed == 0)
                            <form action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="timecard_id" value="{{ $timecard->id }}">
                                <input type="hidden" name="completed" value='1'>
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-btn fa-check-square-o"></i>Complete Timecard</button>
                            </form>
                            
                        @else
                            <button class="btn btn-outline-success btn-sm" disabled><i class="fa fa-fw fa-btn fa-check-square-o"></i>Completed</button>
                            <form id="timecard_form" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="timecard_id" value="{{ $timecard->id }}">
                                <input type="hidden" name="completed" value='false'>
                                <a href="#" onclick="document.getElementById('timecard_form').submit()" style="font-size: 10px;">Undo</a>
                                <!--<button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-btn fa-check-square-o"></i>Complete Timecard</button>-->
                            </form>
                            
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <ul>
            @foreach($timecards as $timecard)
            <li>{{ $timecard }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection