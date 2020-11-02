<template>
  <section class="px-6">
    <table class="data-table bg-white border-collapse w-full">
      <thead class="text-center bg-gray-300">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Author</th>
          <th>Status</th>
          <th>Borrow To</th>
          <th>Publication Date</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="book in books"
          :key="book.id"
          class=" border-b border-gray-300"
        >
          <td v-for="(value, key) in book" :key="key" class=" text-center">
            <span v-if="key == 'category'">{{ value.name }}</span>
            <span v-else>{{ value }}</span>
          </td>
          <td class=" text-center">
            <button
              class="border border-blue-400 rounded text-blue-400 text-sm px-3 py-1 mr-3"
              @click="$emit('open-modal-edit', book)"
            >
              Edit
            </button>
            <button class="bg-red-600 rounded text-white  text-sm px-3 py-1">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</template>

<script>
import { mutations } from "../store";
export default {
  name: "DataTable",
  props: {
    books: {
      type: Array
    }
  },

  methods: {
    setShowEditModal: mutations.setShowEditModal
  }
};
</script>

<style scoped>
th,
td {
  padding: 10px;
  vertical-align: middle;
}
</style>
