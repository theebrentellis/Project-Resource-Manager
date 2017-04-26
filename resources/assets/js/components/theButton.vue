<template>
        <a href="#" role="button" class="btn btn-outline-success btn-sm" @click="openModal()">
            <i class="fa fa-fw fa-btn fa-clock-o" ></i>New Time Card
        </a>
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