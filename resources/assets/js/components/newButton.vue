<template>
    <button class="btn btn-outline-success btn-sm" v-on:click="newTimecard()"><i class="fa fa-fw fa-btn fa-clock-o"></i>New Timecard</button>
</template>

<script>
    import { mapActions } from 'vuex';
    import { mapState } from 'vuex';

    export default {
        namespaced: true,
        methods: {
            newTimecard: function() {
                this.$store.dispatch('openModal');
            }
        }
    }

</script>