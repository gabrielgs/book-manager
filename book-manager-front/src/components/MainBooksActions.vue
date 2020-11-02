<template>
  <section class="flex">
    <form class="flex w-2/3 pl-6 pr-20">
      <div class="relative flex w-full">
        <input
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
          type="text"
          placeholder="Search"
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
    <form class="flex w-1/3 pl-10 pr-6">
      <div class="relative flex w-full">
        <input
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
          type="text"
          placeholder="Filter by Category"
        />
      </div>
    </form>
  </section>
</template>
<script>
export default {
  name: "MainBooksActions"
};
</script>
