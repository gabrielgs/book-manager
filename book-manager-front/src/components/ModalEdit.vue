<template>
  <div
    class="flex items-center justify-center fixed z-10 top-0 bottom-0 right-0 left-0 bg-white opacity-95"
    v-if="showEditModal"
  >
    <div class=" w-1/4">
      <header class="text-center mb-10 text-gray-500 text-2xl">
        Update Book
      </header>
      <section>
        <slot name="modal-body"></slot>
      </section>
      <footer>
        <slot name="modal-footer"></slot>
      </footer>
    </div>
  </div>
</template>

<script>
import { getters } from "../store";
export default {
  name: "ModalEdit",
  computed: {
    showEditModal() {
      return getters.showEditModal();
    }
  }
};
</script>

<style scoped>
.opacity-95 {
  opacity: 0.95;
}
</style>
