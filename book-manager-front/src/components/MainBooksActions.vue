<template>
  <section class="flex px-6">
    <div class="flex bg-white w-full px-3 py-5">
      <form
        class="flex w-2/3 pr-20"
        @submit.prevent="$emit('search-book', search)"
      >
        <div class="relative flex w-full">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
            type="text"
            placeholder="Search"
            v-model="search"
            @keyup="$emit('search-book', search)"
          />
          <span
            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <button>
              <svg
                class="h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
            </button>
          </span>
        </div>
      </form>
      <form
        class="flex w-1/3 pl-10"
        @submit.prevent="$emit('filter-category', '', '')"
      >
        <div class="relative flex w-full">
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
            type="text"
            placeholder="Filter by Category"
            v-model="queryCategory"
            @keyup="$emit('get-categories', queryCategory)"
          />
          <ul
            v-if="showAutoComplete"
            class="bg-white border border-gray-200 mt-10 absolute z-10 left-0 right-0"
          >
            <li
              class="py-2 px-4 cursor-pointer hover:bg-gray-200"
              @click="chooseCategory(category)"
              v-for="category in categories"
              :key="category.id"
            >
              {{ category.name }}
            </li>
          </ul>
        </div>
      </form>
    </div>
  </section>
</template>
<script>
import { getters, mutations } from "../store";
export default {
  name: "MainBooksActions",
  props: {
    categories: {
      type: Array
    }
  },
  data() {
    return {
      search: "",
      queryCategory: ""
    };
  },

  computed: {
    showAutoComplete() {
      return getters.showAutoComplete();
    }
  },

  methods: {
    setShowAutoComplete: mutations.setShowAutoComplete,
    chooseCategory(category) {
      this.setShowAutoComplete(false);
      this.queryCategory = category.name;
      this.$emit("filter-category", "", "", category.id);
    }
  }
};
</script>
