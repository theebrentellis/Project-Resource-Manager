<template>
    <div class="cal"></div>
</template>
<style>
.fc-title {
    display: block;
}
.fc-content {
    white-space: inherit !important;
    text-align: center;
}
</style>
<script>  
    require('fullcalendar');
    require('moment');

    const moment = require('moment');

    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        methods: {
            openModal(date){
                this.$store.dispatch("openModal", {date: date});
                // console.log(this.$store.state.modal)
            }
        },
        mounted: function(){
            var vm = this;
            
            $(".cal").fullCalendar({
                    header: {
                        left: 'prev, next today',
                        center: 'title',
                        right: 'month, agendaWeek, agendaDay, list'
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
                    eventRender: function (event, element) {
                        element.click(function () {
                            console.log("eventRender element.click");
                        })
                    },

                    eventClick: function (event, jsEvent, view) {
                        console.log(event);
                        // vm.openModal();
                    },

                    dayClick: function (date, jsEvent, view) {
                        console.log('dayClick');
                        // date = moment(date).format("MMMM Do YYYY");
                        vm.openModal(date);
                    }
                });
        },
    }

</script>