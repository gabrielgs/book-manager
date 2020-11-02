<template>
  <main>
    <MainHeader />
    <MainBooksActions />
    <DataTable :books="books" />
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
      booksWithCategory: [],
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
        const resBooks = await axios.get(
          `http://localhost:8000/api/books?page=${page}`
        );

        const promisesBooksCategory = resBooks.data.data.map(async book => {
          const resCategoryBook = await axios.get(
            `http://localhost:8000/api/categories/${book.category_id}`
          );

          const { category_id, ...res } = book;
          const { name } = resCategoryBook.data;

          return {
            ...res,
            category: {
              id: category_id,
              name
            }
          };
        });

        const booksWithCategory = await Promise.all(promisesBooksCategory);
        this.books = booksWithCategory;

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
