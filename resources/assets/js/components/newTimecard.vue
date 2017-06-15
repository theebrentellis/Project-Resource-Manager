<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Timecard
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="close()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h4>
                        </div>
                        <div v-if="state.errors" class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="state.errors = ''">
                                <span aria-hidden="true">&times;</span>
                            </button> {{ state.errors }}
                        </div>
                        <div class="card-block">
                            <form>
                                <!--<div class="form-group">
                                    <p v-if="state.date"><strong>Date: </strong>{{ state.date.date | dateFormat }}</p>
                                </div>-->
                                <div class="form-group row">
                                    <label for="timecard_date" class="col-3 col-form-label"><strong>Date:</strong></label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="timecard_date" v-model="form.date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="project" class="col-3 col-form-label"><strong>Project:</strong></label>
                                    <div class="col-9">
                                        <select name="" id="project" class="custom-select form-control" v-on:input="form.project_id = $event.target.value">
                                            <option selected>Choose...</option>
                                            <option v-for="project in projects" v-bind:value="project.id">{{project.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-3 col-form-label"><strong>Role:</strong></label>
                                    <div class="col-9">
                                        <select name="" id="role" class="custom-select form-control" v-on:input="updateRole($event.target.value); form.role_id = $event.target.value">
                                            <option value="">Choose...</option>
                                            <option v-for="role in roles" v-bind:value="role.id">{{ role.label }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div v-if="state.role_id" class="form-group row">
                                    <label for="user" class="col-3 col-form-label"><strong>{{ getters.timecardRole.label }}</strong></label>
                                    <div class="col-9">
                                        <select name="" id="user" class="custom-select form-control" v-on:input="form.user_id = $event.target.value">
                                            <option value="">Choose...</option>
                                            <option v-for="user in usersByRole(users, state)" v-bind:value="user.id">{{user.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hours" class="col-3 col-form-label"><strong>Hours:</strong></label>
                                    <div class="col-9">
                                        <input type="number" id="hours" class="form-control" v-model="form.hours" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="notes"><strong>Notes:</strong></label>
                                    <textarea name="" id="notes" class="form-control" rows="5" v-model="form.notes"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-primary" type="button" @click="closeSubmit()">Assign Time</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    require('moment');
    const moment = require('moment');

    import { mapActions } from 'vuex';
    import { mapState } from 'vuex';

    export default {
        namedspaced: true,
        computed: {
            state: {
                get() {
                    return this.$store.state.newTimecard;
                },
            },
            roles: {
                get() {
                    return this.$store.state.roles;
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
            }
        },
        methods: {
            closeSubmit: function () {
                this.$store.dispatch("closeModal", this.form);
            },
            close: function () {
                this.$store.commit("CLOSE_MODAL");
            },
            showModal: function () {
                console.log("showModal");
            },
            updateProjectId: function (id) {
                this.$store.commit("SELECT_PROJECT_ID", id);
            },
            updateUserId: function (id) {
                this.$store.commit("SELECT_USER_ID", id);
            },
            updateRole: (value) => {
                console.log(value);
                this.$store.commit("SELECT_ROLE_ID", value);
            },
            usersByRole: (users, state) => {
                let roleUsers = [];
                users.forEach((user) => {
                    user.user_roles.forEach((role) => {
                        if (role.role_id == state.role_id) {
                            roleUsers.push(user);
                        }
                    });
                });
                return roleUsers;
            }
        },
        data: () => {
            return {
                form: {

                },
                // project: {

                // },
                // developer: {

                // }
            }
        },
        mounted: function () {
            // this.$store.dispatch('loadTimecardRoles');
            // this.$store.dispatch('loadTimecardUsers');
            // this.$store.dispatch('loadTimecardProjects');
            document.addEventListener('keydown', (e) => {
                if (this.showModal && e.keyCode == 27) {
                    console.log("ESC");
                    this.close();
                }
            });
        },
        filters: {
            dateFormat: function (date) {
                return moment(date).format("MMMM Do, YYYY");
            }
        }
    };

</script>