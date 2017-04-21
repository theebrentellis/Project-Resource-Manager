<template>
        <button type="button" class="btn btn-default" @click="openModal()">
            <i class="fa fa-clock-o" style="margin-right: 2%;"></i>Assign Time
        </button>
</template>

<script>
    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        methods: {
            openModal: function(){
                this.$store.dispatch("openModal");
            },
        }
    }
</script>