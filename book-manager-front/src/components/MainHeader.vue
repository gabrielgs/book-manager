<template>
  <header class="flex justify-between align-middle py-8 px-6">
    <h1 class="text-2xl">Books</h1>
    <button
      class="transition duration-300 ease-in-out button bg-green-500 hover:bg-green-600 rounded inline-flex items-center py-2 px-4 text-white"
      @click="setShowCreateModal(true)"
    >
      <svg
        class="w-4 h-4 mr-2"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M12 6v6m0 0v6m0-6h6m-6 0H6"
        />
      </svg>
      <span>New Book</span>
    </button>
  </header>
</template>

<script>
import { mutations } from "../store";
export default {
  name: "MainHeader",

  methods: {
    setShowCreateModal: mutations.setShowCreateModal
  }
};
</script>
