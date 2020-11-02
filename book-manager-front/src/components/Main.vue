<template>
  <main>
    <MainHeader />
    <MainBooksActions />
    <DataTable />
    <VPagination :pagination="pagination" @paginate="fetchBooks" />
  </main>
</template>

<script>
import MainHeader from "@/components/MainHeader";
import MainBooksActions from "@/components/MainBooksActions";
import DataTable from "@/components/DataTable";
import VPagination from "@/components/VPagination";
import axios from "axios";

export default {
  name: "Main",
  data() {
    return {
      books: [],
      pagination: {}
    };
  },

  components: {
    MainHeader,
    MainBooksActions,
    DataTable,
    VPagination
  },

  methods: {
    async fetchBooks(page) {
      try {
        let resBooks = await axios.get(
          `http://localhost:8000/api/books?page=${page}`
        );
        this.books = resBooks.data.data;
        this.pagination = resBooks.data.meta;
      } catch (error) {
        console.log(error);
      }
    }
  },

  mounted() {
    this.fetchBooks();
  }
};
</script>
