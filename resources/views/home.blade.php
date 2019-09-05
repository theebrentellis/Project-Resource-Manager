@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <a href="{{ route('timecards') }}" class="btn btn-sm btn-secondary">
                    My Timecards
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div>
                <div class="card card-inverse" style="background-color: #333; border-color: #333;">
                    <div class="card-body">
                        <h2 class="card-title">Projects</h2>
                        <a 
                            href="{{ route('projects') }}" 
                            class="btn btn-outline-secondary btn-sm" 
                            role="button"
                        >
                            <i class="fas fa-plus-square fa-fw fa-btn"></i>
                            Add New Project
                        </a>
                    </div>
                </div>
                <div>
                    <table class="table">
                        <thead class="thead-default">
                            <th>Project Name</th>
                            <th>Due Date</th>
                            <th>Build Time</th>
                            <th>Progress</th>
                            <th>Completed Hours</th>
                            <th>Assigned Hours</th>
                            <th>Available Hours</th>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a href="/project/{{$project->id}}/show">{{ $project->name }}</a>
                                </td>
                                <td>
                                    {{  date('F d, Y', strtotime($project->dueDate)) }}
                                </td>
                                <td>
                                    {{ $project->totalHours }}
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $project->percentTime() }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{ $project->percentTime().'%' }}</div>
                                    </div>
                                </td>
                                <td>
                                    {{ $project->cTime() }}
                                </td>
                                <td>
                                    {{ $project->aTime() }}
                                </td>
                                <td>
                                    {{ $project->availableTime() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--<newButton></newButton>-->
    {{-- <RoleDashboard></RoleDashboard> --}}
    {{-- <newTimecard v-if="$store.state.newTimecard.showModal" @close="$store.state.newTimecard.showModal = false"></newTimecard> --}}
    <div class="row">
        <div class="col">
            <calendar></calendar>
        </div>
    </div>
</div>

@endsection
