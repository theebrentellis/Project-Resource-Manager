<template>
        <a href="#" role="button" class="btn btn-outline-danger btn-sm" @click="openModal()">
            <i class="fa fa-clock-o" ></i>  Assign Time
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