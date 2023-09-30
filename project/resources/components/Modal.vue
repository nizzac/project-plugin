<template>
    <Transition name="modal">
        <div v-if="open" class="fixed top-0 left-0 w-full h-full items-center justify-center flex bg-black/70 backdrop-blur-sm transtion-all duration-300" >
            <div class="container relative h-5/6 p-5 p7 bg-white rounded-md shadow-lg transition-all duration-300">
                <button @click="$emit('close')" class="absolute flex items-center justify-center w-8 h-8 rounded-full top-2 right-2 hover:text-white hover:bg-indigo-400 text-lg transition-all duration-300"><i class="icon-times"></i></button>
                <slot></slot>
            </div>
        </div>
    </Transition>
</template>

<script setup>
    const props = defineProps({
        open: Boolean
    })
</script>

<style>
.modal-mask {
  z-index: 9998;
}

.modal-container {
  width: 300px;
  margin: auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from {
  opacity: 0;
}

.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>