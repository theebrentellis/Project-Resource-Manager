<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <div class="card">
            <div class="card-header">
                <h4>Assign Time
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div> 
            <div class="card-block">
                <p v-if="state.date"><strong>Date: </strong>{{ state.date.date | dateFormat }}</p>
                <form @submit.prevent="close">
                    <div class="form-group">
                    
                    </div>
                    <div class="form-group">
                        <label for="project">Project:</label>
                        <select name="" id="project" class="custom-select" v-on:input="updateProjectId($event.target.value)">
                            <option selected>Choose...</option>
                            <option v-for="project in state.allProjects" v-bind:value="project.id">{{project.name}}</option>
                            <p>{{project.id}} {{project.name}}</p>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dev">Developer:</label>
                        <select name="" id="developer" class="custom-select" v-on:input="updateDeveloperId($event.target.value)">
                            <option selected>Choose...</option>
                            <option v-for="developer in state.allDevelopers" v-bind:value="developer.id">{{developer.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hours">Hours:
                            <input type="number" id="hours" class="form-control" v-model="form.hours" required>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="allDay" value="true" v-model="form.allDay">
                          All Day
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea name="" id="comments" class="form-control" rows="5" v-model="form.notes"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="start_time">From: </label>
                        <input type="time" class="form-control" id="startTime" v-model="form.start_time">
                    </div>
                    <div class="form-group">
                        <label for="end_time">End: </label>
                        <input type="time" class="form-control" id="endTime" v-model="form.end_time">
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-outline-primary" @click="closeSubmit()">Assign Time</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
    require('moment');
    const moment = require('moment');

    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        computed: {
            state: {
                get() { 
                    return this.$store.state.modal;
                },
                set(state){
                    this.$store.dispatch("updateState", state);
                }
            },
            message: {
                get() {
                    return this.$store.state.modal.message
                },
                set(message){
                    this.$store.dispatch("UPDATE_MESSAGE", material);
                }  
            },
            dev_id: {
                get(){
                    return this.$store.state.modal.dev_id
                }
            }
        },
        methods: {
            closeSubmit: function() {
                this.$store.dispatch("closeModal", this.form);
            },
            close: function(){
                this.$store.commit("CLOSE_MODAL");
            },
            showModal: function() {
                console.log("showModal");
            },
            updateProjectId: function(value){
                this.$store.commit("SELECT_PROJECT_ID", value);
            },
            updateDeveloperId: function(value){
                this.$store.commit("SELECT_DEV_ID", value)
            }
        },
        data: () => {
            return {
                form: {
                    
                },
                project: {
                    
                },
                developer: {
                    
                }
            }
        },
        mounted: function() {
            document.addEventListener('keydown', (e) => {
                if(this.showModal && e.keyCode == 27){
                    console.log("ESC");
                    this.close();
                }
            });
        },
        filters: {
            dateFormat: function(date){
                return moment(date).format("MMMM Do, YYYY");
            }
        }
    };
</script>