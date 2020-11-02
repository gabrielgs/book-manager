<template>
  <div
    class="flex  items-center justify-center fixed z-10 top-0 bottom-0 right-0 left-0 bg-white opacity-95"
    v-if="showCreateModal"
  >
    <div class=" w-1/4">
      <header class="text-center mb-10 text-gray-500 text-2xl">
        New Book
      </header>
      <section>
        <form>
          <div class="mb-4">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Name"
              v-model="newBook.name"
            />
          </div>
          <div class="mb-4">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Author"
              v-model="newBook.author"
            />
          </div>
          <div class="mb-4 relative">
            <!-- <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Status"
              v-model="newBook.status"
            > -->
            <select
              v-model="newBook.status"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-state"
            >
              <option disabled value="">Status</option>
              <option>Available</option>
              <option>Not Available</option>
            </select>
            <div
              class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
            >
              <svg
                class="fill-current h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path
                  d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                />
              </svg>
            </div>
          </div>
          <div class="mb-4">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="date"
              v-model="newBook.publication_date"
            />
          </div>
          <div class="mb-4 relative">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Category"
              v-model="query"
              @keyup="$emit('get-categories', query)"
            />
            <ul
              v-if="showAutoComplete"
              class="bg-white border border-gray-200 mt-1 absolute z-10 left-0 right-0"
            >
              <li
                class="py-2 cursor-pointer hover:bg-gray-200"
                @click="chooseCategory(category)"
                v-for="category in categories"
                :key="category.id"
              >
                {{ category.name }}
              </li>
            </ul>
          </div>
        </form>
      </section>
      <footer>
        <div class="flex justify-between">
          <button
            class="btn border border-green-300 border-solid hover:border-green-600  rounded px-10 py-2"
            @click="setShowCreateModal(false)"
          >
            Cancel
          </button>
          <button
            class="btn bg-green-500 hover:bg-green-700 text-white rounded px-10 py-2"
            @click="addNewBook"
          >
            Create
          </button>
        </div>
      </footer>
    </div>
  </div>
</template>

<script>
import { getters, mutations } from "../store";
export default {
  name: "Modal",
  props: {
    categories: {
      type: Array
    }
  },
  data() {
    return {
      query: "",
      newBook: {
        name: "",
        author: "",
        status: "",
        publication_date: "",
        category_id: ""
      }
    };
  },
  computed: {
    showAutoComplete() {
      return getters.showAutoComplete();
    },

    showCreateModal() {
      return getters.showCreateModal();
    }
  },
  methods: {
    setShowAutoComplete: mutations.setShowAutoComplete,
    setShowCreateModal: mutations.setShowCreateModal,
    chooseCategory(category) {
      this.setShowAutoComplete(false);
      this.newBook.category_id = category.id;
      this.query = category.name;
    },

    addNewBook() {
      this.$emit("create-book", this.newBook);
    }
  }
};
</script>

<style scoped>
.opcity-95 {
  opacity: 0.75;
}
</style>
