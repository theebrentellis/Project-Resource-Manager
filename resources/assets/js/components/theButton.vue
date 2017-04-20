<template>
        <button type="button" class="btn btn-default btn-sm" id="assign" @click="openModal()">Assign Time</button>
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