<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-inverse" style="background-color: #333; border-color: #333;">
                    <div class="card-body">
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
                            <th>Due Date</th>
                            <th>Build Time</th>
                            <th>Progress</th>
                            <th>Completed Hours</th>
                            <th>Assigned Hours</th>

                        </thead>
                        <tbody>
                            <!--@foreach ($projects as $project)-->
                            <tr>
                                <td>
                                    <!--<a href="/project/{{$project->id}}/show">{{ $project->name }}</a>-->
                                </td>
                                <td>
                                    <!--{{ date('F d, Y', strtotime($project->dueDate)) }}-->
                                </td>
                                <td>
                                    <!--{{ $project->totalHours }}-->
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    <!--{{ $project->getProjectCompletedTime() }}-->
                                </td>
                                <td>
                                    <!--{{ $project->getProjectAssignedTime() }}-->
                                </td>
                            </tr>
                            <!--@endforeach-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
</template>

<script>
    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        methods: {
            openModal: function(){
                this.$store.dispatch("openModal");
            },
        }
    }
</script>