<template type="text/x-template">
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <slot name="header">The Header</slot>
                    </div>
                    <div class="modal-body">
                        <slot name="body">The Body</slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer">
                            The Footer
                            <br>
                            <button class="modal-default-button btn btn-sm btn-primary" @click="$emit('close')">Done</button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {
            console.log("Modal Mounted!");
        }
    };
</script>