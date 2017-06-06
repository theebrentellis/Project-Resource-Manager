/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

import calendar from './components/calendar.vue';
import newtimecard from './components/newTimecard.vue';
import newbutton from './components/newButton.vue';
import projectdashboard from './components/ProjectDashboard.vue';
import roledashboard from './components/RoleDashboard.vue';

import { newTimecard } from './store/actions';

import store from './store';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import { mapActions } from 'vuex';
import { mapState } from 'vuex';

window.App = new Vue({
    el: '#app',
    store,
    components: { calendar, newtimecard, projectdashboard, roledashboard, newbutton },
});



$(document).ready(() => {
    $('#editTimecard').on('click', () => {
        var timecards = document.getElementsByClassName("timecardCheckbox");
        for (var x = 0; x < timecards.length; x++) {
            if (timecards[x].type === "hidden") {
                timecards[x].type = 'checkbox';
            }
            else if (timecards[x].type == 'checkbox') {
                timecards[x].type = "hidden";
            }
        }
    });

    $('button.btn.btn-outline-danger.btn-sm').hover(function() {
        console.log("Hotdog");
    }, function() {
        console.log("Not Hotdog");
    });
});