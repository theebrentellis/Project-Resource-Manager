<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              default header
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              default body
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              default footer
              <button class="btn btn-primary" @click="$emit('close')">
                OK
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>

    import {mapActions} from 'vuex';
    import {mapState} from 'vuex';

    export default {
        namedspaced: true,
        methods: {
            close: function() {
                console.log("Close Modal");
                // this.$state.closeModal()
                // this.closeModal();
                // this.showModal = false;
                // this.title = "";
                // this.body = "";
            },
            showModal: function() {
                console.log("showModal");
            }
        },
        mounted: function() {
            document.addEventListener('keydown', (e) => {
                console.log("ESC");
                if(this.show && e.keyCode == 27){
                    this.close();
                }
            });
        }
    };
</script>