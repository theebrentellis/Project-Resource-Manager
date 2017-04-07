<template>
    <div class="cal"></div>
</template>

<script>  
    require('fullcalendar');

    const moment = require('moment');

    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        methods: {
            openModal(){
                console.log(this.$store.state.modal)
                // this.$store.dispatch('openModal');
            }
        },
        mounted: function(){
            var vm = this;
            
            $(".cal").fullCalendar({
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
                        // vm.openModal();
                    }
                });

            // $(()=>{
            //     $('.cal-container').fullCalendar({
            //         header: {
            //             left: 'prev, next today',
            //             center: 'title',
            //             right: 'month, agendaWeek, agendaDay'
            //         },
            //         editable: true,
            //         droppable: true,
            //         eventLimit: true,
            //         weekends: true,
            //         eventSources: [{
            //             //Project Due Dates
            //             url: '/api/projectDueDates',
            //             color: 'red',
            //         }],
            //         navLinks: true,
            //         eventRender: function (event, element) {
            //             element.click(function () {
            //                 console.log("eventRender element.click");
            //             })
            //         },

            //         eventClick: function (event, jsEvent, view) {
            //             console.log(event);
            //             openModal();
            //         },

            //         dayClick: function (date, jsEvent, view) {
            //             console.log('dayClick');
            //             // $emit("openModal");
            //             openModal();
            //         }
            //     });
            // });
        },
    }

</script>