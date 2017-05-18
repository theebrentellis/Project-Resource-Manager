<template>
    <div class="row">
        <div class="col col-3">
            <div class="card">
                <div class="card-header" style="background-color: rgb(51, 51, 51); border-color: rgb(51, 51, 51);">
                    <div class="btn-group dashboard">
                        <button class="btn btn-outline-secondary" id="roleButtonDisplay" v-on:click="allRoleTimeCards()">{{ getters.dashboardRole.label | pluralize }}</button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" v-for="role in state.dashboardRoles" :key="role.id" :ref="role.label" class="dropdown-item" v-on:click="setDashBoardRoleId(role.id)">{{ role.label | pluralize }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <ul class="nav flex-column" v-for="user in getters.dashboardUsersByRole" :key="user.id">
                        <li v-bind:class="{active: user.id === state.dashboardUser.id }" v-on:click="setDashboardUser(user.id)">
                            <a href="" class="nav-link" data-toggle="tab" role="tab">{{ user.name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col col-9">
            <div class="tab-content">
                <div class="tab-pane active" id="" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 v-if="!state.dashboardUser.name">{{ "All " + getters.dashboardRole.label | pluralize }}</h5>
                            <h5 v-else class="card-text">{{ state.dashboardUser.name }}</h5>
                            <a href="#" role="button" class="btn btn-outline-success btn-sm" @click="newTimeCard()">
                                <i class="fa fa-fw fa-btn fa-clock-o"></i>New Time Card
                            </a>
                        </div>
                        <div class="card-block">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th v-for="project in state.dashboardProjects" :key="project.id">
                                            {{ project.name }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!state.dashboardUser.name">
                                        <td v-for="project in state.dashboardProjects" :key="project.id">
                                            {{ project | totalTime(state) }}
                                        </td>
                                    </tr>
                                    <tr v-else>
                                        <td v-for="project in state.dashboardProjects" :key="project.id">
                                            {{ project | projectTime(getters) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<style>
/*.dashboard.card-header {
    background: black;
}*/
.dashboard {
    width: 100%;
}
#roleButtonDisplay {
    width: 100%;
}
</style>

<script>
    import { mapActions } from 'vuex';
    import { mapState } from 'vuex';

    export default {
        namespaced: true,
        computed: {
            state: {
                get() {
                    return this.$store.state.dashboard;
                },
                set(state) {
                    this.$store.dispatch('updateDashboardState', state);
                }
            },
            getters: {
                get() {
                    return this.$store.getters;
                },
                set(getters){

                }
            }
        },
        methods: {
            newTimeCard: function(){
                this.$store.dispatch('openModal');
            },
            setDashboardUser: function(id) {
                this.$store.dispatch('setDashboardUser', id);
            },
            allRoleTimeCards: function(){
                this.$store.dispatch('allRoleTimeCards');
            },
            setDashBoardRoleId: function(roleId){
                this.$store.dispatch('setDashboardRoleId', roleId);
            }
        },
        mounted: function(){
            var vm = this;
            this.$store.dispatch('loadDashboardRoles');
            this.$store.dispatch('loadDashboardTimeCards');
            this.$store.dispatch('loadDashboardProjects');
            this.$store.dispatch('loadDashboardUsers');
        },
        filters: {
            totalTime: (project, state) => {
                var time = 0;
                for(var card in state.dashboardTimeCards){
                    if(state.dashboardTimeCards[card].project_id == project.id){
                        time += state.dashboardTimeCards[card].time;
                    }

                }
                return time;
            },
            projectTime: (project, getters) => {
                var time = 0;
                for(var card in getters.userTimeCards){
                    if(getters.userTimeCards[card].project_id == project.id){
                        time += getters.userTimeCards[card].time;
                    }
                }
                return time;
            },
            pluralize: (name) => {
                if(name){
                    return name + 's';
                }
            }
        },
        data: () => {
            return {
                tab: 1,
            }
        },
        watch: {
            state: function() {
                console.log("State Watcher");
            }
        }
    }

</script>