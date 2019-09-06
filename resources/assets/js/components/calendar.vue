<style lang='scss'>
    @import '~@fullcalendar/core/main.css';
    @import '~@fullcalendar/daygrid/main.css';
</style>
<script>  
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'

    require('moment');

    const moment = require('moment');

    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        methods: {
            openModal(date){
                this.$store.dispatch("openModal", {date: date});
            }
        },
        components: {
            FullCalendar // make the <FullCalendar> tag available
        },
        data() {
            return {
                calendarPlugins: [dayGridPlugin]
            }
        }
    }

</script>
<template>
    <FullCalendar defaultView="dayGridMonth" :plugins="calendarPlugins" />
</template>