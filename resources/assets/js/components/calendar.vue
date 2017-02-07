<template>
        <div v-el:calendar></div>
</template>

<script>
    // require('./../bootstrap');
    require('jquery');
    const moment = require('moment');
    const fullCalendar = require('fullcalendar');

    // const actions = require('../calendarActions.js');

    $(document).ready(function() {

        $("#calendar").fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            editable: true,
            droppable: true,
            eventLimit: true,
            weekends: true,
            eventSources: [{
                //Project Due Dates
                url: '/api/projectDueDates',
                color: 'red',
            }],
            navLinks: true,
        });
    });
</script>