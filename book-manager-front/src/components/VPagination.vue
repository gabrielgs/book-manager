<template>
  <div
    class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6"
  >
    <div class="flex-1 flex justify-between sm:hidden">
      <a
        href="#"
        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
      >
        Previous
      </a>
      <a
        href="#"
        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
      >
        Next
      </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm leading-5 text-gray-700">
          Showing
          <span class="font-medium">{{ pagination.from }}</span>
          to
          <span class="font-medium">{{ pagination.to }}</span>
          of
          <span class="font-medium">{{ pagination.total }}</span>
          results
        </p>
      </div>
      <div>
        <nav class="relative z-0 inline-flex shadow-sm">
          <a
            v-if="pagination.current_page > 1"
            @click.prevent="changePage(pagination.current_page - 1)"
            href="#"
            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
            aria-label="Previous"
          >
            <!-- Heroicon name: chevron-left -->
            <svg
              class="h-5 w-5"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"
              />
            </svg>
          </a>
          <a
            v-for="page in pagesNumber"
            :key="page"
            href="#"
            :class="[
              '-ml-px',
              'relative',
              'inline-flex',
              'items-center',
              'px-4',
              'py-2',
              'border',
              'border-gray-300',
              'bg-white',
              'text-sm',
              'leading-5',
              'font-medium',
              'text-gray-700',
              'hover:text-gray-500',
              'focus:z-10',
              'focus:outline-none',
              'focus:border-blue-300',
              'focus:shadow-outline-blue',
              'active:bg-gray-100',
              'active:text-gray-700',
              'transition ease-in-out',
              'duration-150',
              { active: page == pagination.current_page }
            ]"
            @click.prevent="changePage(page)"
          >
            {{ page }}
          </a>
          <a
            v-if="pagination.current_page < pagination.last_page"
            @click.prevent="changePage(pagination.current_page + 1)"
            href="#"
            class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
            aria-label="Next"
          >
            <!-- Heroicon name: chevron-right -->
            <svg
              class="h-5 w-5"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              />
            </svg>
          </a>
        </nav>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "VPagination",
  props: {
    pagination: {
      type: Object
    }
  },
  computed: {
    isActived() {
      return this.pagination.current_page;
    },

    pagesNumber() {
      const offset = 4;

      if (!this.pagination.to) {
        return [];
      }

      let from = this.pagination.current_page - offset;
      if (from < 1) {
        from = 1;
      }

      let to = from + offset * 2;
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      let pagesArray = [];
      for (let page = from; page <= to; page++) {
        pagesArray.push(page);
      }

      return pagesArray;
    }
  },

  methods: {
    changePage(page) {
      this.pagination.current_page = page;
      this.$emit("paginate", page);
    }
  }
};
</script>

<style scoped>
.active {
  color: white;
  background: #48bb78;
}
</style>
