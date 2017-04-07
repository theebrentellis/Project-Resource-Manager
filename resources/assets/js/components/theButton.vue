<template>
        <button type="button" class="btn btn-primary btn-sm" id="show-modal" @click="openModal()">Vue Component Button</button>
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