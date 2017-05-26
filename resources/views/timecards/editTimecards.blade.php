@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Timecard</h4>
                </div>
                <div class="card-block">
                    <form action="/timecards/{{ $timecard->id }}/edit" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="edit" value="updateTimecard">
                        <div class="form-group">
                            <label for="editTimecardNotes" class="control-label">Edit Timecard Notes:</label>
                            <input type="text" class="form-control" name="editTimecardNotes" value="{{ $timecard->notes }}">
                        </div>
                        <div class="form-group">
                            <label for="editTimecardTime" class="control-label">Edit Timecard Time:</label>
                            <input type="number" class="form-control" name="editTimecardTime" value="{{ $timecard->time }}">
                        </div>
                        <div class="form-group">
                            <label for="editTimecardDate" class="control-lable">Edit Timecard Date:</label>
                            <input type="date" class="form-control" name="editTimecardDate" value="{{ $timecard->date }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Edit Timecard</button>
                        </div>
                    </form>
                    <form action="/timecards/{{ $timecard->id }}/edit" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="delete" value="deleteTimecard">
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">Delete Timecard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection