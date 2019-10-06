<template>
    <div class="row">
        <div class="col col-3">
            <div class="card">
                <div class="card-header" style="background-color: rgb(51, 51, 51); border-color: rgb(51, 51, 51);">
                    <div class="btn-group dashboard">
                        <button v-if="!dashboardRoles(state, roles)" class="btn btn-outline-secondary"><i class="fa fa-spinner fa-pulse fa-fw fa-btn"></i></button>
                        <button v-else class="btn btn-outline-secondary" type="button" id="roleButtonDisplay" v-on:click="allRoleTimeCards()">{{ dashboardRoles(state, roles) | pluralize }}</button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" v-for="role in roles" :key="role.slug" :ref="role.label" class="dropdown-item" v-on:click="setDashboardRole(role)">{{ role.label | pluralize }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav flex-column" v-for="user in dashboardRoleUsers(state, users)" :key="user.id">
                        <li v-bind:class="{active: user.id === state.dashboardUser.id }" v-on:click="setDashboardUser(user)">
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
                            <h5 v-if="!dashboardRoles(state, roles)"><i class="fa fa-spinner fa-pulse fa-fw fa-btn"></i></h5>
                            <h5 v-else-if="!state.dashboardUser.name">{{ "All " + dashboardRoles(state, roles) | pluralize }}</h5>
                            <h5 v-else class="card-text">{{ state.dashboardUser.name }}</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                             Assigned Time
                                        </th>
                                        <th>
                                            Completed Time
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="!state.dashboardUser.name">
                                        <td>
                                            {{ allRoleUsersAssTime(timecards, state) }}
                                        </td>
                                        <td>
                                            {{ allRoleUsersCompTime(timecards, state) }}
                                        </td>
                                    </tr>
                                    <tr v-else>
                                        <td>
                                            {{ userAssignedTime(timecards, state) }}
                                        </td>
                                        <td>
                                            {{ userCompletedTime(timecards, state) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!--<ul>
                <li v-for="user in users">{{ user.name }}</li>
            </ul>-->
            <!--<div>
                 {{ dashboardRoles(state, roles) }}
            </div>-->

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
                }
            },
            getters: {
                get() {
                    return this.$store.getters;
                }
            },
            users: {
                get() {
                    return this.$store.state.users;
                }
            },
            projects: {
                get() {
                    return this.$store.state.projects;
                }
            },
            timecards: {
                get() {
                    return this.$store.state.timecards;
                }
            },
            roles: {
                get() {
                    return this.$store.state.roles;
                }
            },
        },
        methods: {
            newTimeCard: function () {
                this.$store.dispatch('openModal');
            },
            setDashboardUser: function (user) {
                this.$store.dispatch('setDashboardUser', user);
            },
            allRoleTimeCards: function () {
                this.$store.dispatch('allRoleTimeCards');
            },
            setDashboardRole: function (role) {
                this.$store.dispatch('setDashboardRole', role);
            },
            userTimecards: (state, timecards) => {
                console.log("What userTimecards?");
                // let userTimecards = [];
                // timecards.forEach((timecard) => {
                //     console.log("Timecard: " + timecard);
                // });
                // return userTimecards;

            },
            dashboardRoles: (state, roles) => {
                let role = {};
                roles.forEach(function (element) {
                    if (element.slug == state.role) {
                        role = element;
                    }
                });
                return role.label;
            },
            dashboardUser: (state, users) => {
                let user = {};
                users.forEach(function (element) {
                    if (element.id == state.dashboardUser.id) {
                        user = element;
                    }
                });
                return user;
            },
            dashboardRoleUsers: (state, users) => {
                let roleUsers = [];
                users.forEach((user) => {
                    user.user_roles.forEach((role) => {
                        if (role.role.slug == state.role) {
                            roleUsers.push(user);
                        }
                    });
                });
                return roleUsers;
            },
            allRoleUsersAssTime: (timecards, state) => {
                let time = 0;
                timecards.forEach((timecard)=>{
                    if(timecard.completed == 0 && timecard.role.slug == state.role){
                        time += timecard.time;
                    }
                });
                return time;
            },
            allRoleUsersCompTime: (timecards, state) => {
                let time = 0;
                timecards.forEach((timecard)=>{
                    if(timecard.completed == 1 && timecard.role.slug == state.role){
                        time += timecard.time;
                    }
                });
                return time;
            },
            userAssignedTime: (timecards, state) => {
                let time = 0;
                timecards.forEach((timecard)=>{
                    if(timecard.completed == 0 && timecard.user_id == state.dashboardUser.id && timecard.role.slug == state.role){
                        time += timecard.time;
                    }
                });
                return time;
            },
            userCompletedTime: (timecards, state) => {
                let time = 0;
                timecards.forEach((timecard)=>{
                    if(timecard.completed == 1 && timecard.user_id == state.dashboardUser.id && timecard.role.slug == state.role){
                        time += timecard.time;
                    }
                });
                return time;
            }
        },
        
        filters: {
            // totalTime: (project, state) => {
            //     var time = 0;
            //     for (var card in state.dashboardTimeCards) {
            //         if (state.dashboardTimeCards[card].project_id == project.id) {
            //             time += state.dashboardTimeCards[card].time;
            //         }
            //     }
            //     return time;
            // },
            // projectTime: (project, getters) => {
            //     var time = 0;
            //     for (var card in getters.userTimeCards) {
            //         if (getters.userTimeCards[card].project_id == project.id) {
            //             time += getters.userTimeCards[card].time;
            //         }
            //     }
            //     return time;
            // },
            pluralize: (name) => {
                if (name) {
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
            state: function () {
                console.log("State Watcher");
            }
        },
        mounted: function () {
                var vm = this;
        },
    }

</script>