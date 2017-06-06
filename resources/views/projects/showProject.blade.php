@extends('layouts.app')
@section('content')
<div class="container">
    <newTimecard v-if="$store.state.newTimecard.showModal" @close="$store.state.newTimecard.showModal = false"></newTimecard>
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
            <newButton></newButton>
            <ul class="nav nav-tabs list-inline" role="tablist">
                <li class="nav-item list-inline-item">
                    <a href="#listView" class="nav-link active" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-list"></i>List View</a>
                </li>
                <li class="nav-item list-inline-item">
                    <a href="#cardView" class="nav-link" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-address-card-o"></i>Card View</a>
                </li>
            </ul>
            <hr>
            <a href="#" id="editTimecard">Edit Timecard</a>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="listView" role="tabpanel">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th>Project</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Notes</th>
                            <th>Completed</th>
                        </thead>
                        <tbody>
                            @foreach($timecards as $timecard)
                                <tr>
                                    <td>
                                        <form id="editTimecardForm" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" class="form-check-input timecardCheckbox" id="" onclick="$(this).closest('form').submit();">
                                            <input type="hidden" name="edit" value="edit">
                                        </form>
                                    </td>
                                    <td>{{ $timecard->project->name }}</td>
                                    <td>{{ date('F d',strtotime($timecard->date)) }}</td>
                                    <td>{{ $timecard->user->name }}</td>
                                    <td>{{ $timecard->role->label }}</td>
                                    <td>{{ $timecard->notes }}</td>
                                    @if($timecard->completed == 0)
                                        <td>
                                            <form id="" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="completed" value="1">
                                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-btn fa-square-o"></i>Complete Timecard</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                        <button class="btn btn-outline-success btn-sm" disabled><i class="fa fa-fw fa-btn fa-check-square-o"></i>Completed</button>
                                        <form id="" action="/timecards/{{ $timecard->id }}/edit" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="completed" value="'0'">
                                            <a href="#" onclick="$(this).closest('form').submit();" style="font-size: 10px;">Undo</a>
                                        </form>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="cardView" role="tabpanel">
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
    </div>
</div>

@endsection