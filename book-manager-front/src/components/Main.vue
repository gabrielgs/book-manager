<template>
  <main>
    <MainHeader />
    <MainBooksActions />
    <DataTable :books="books" />
    <VPagination :pagination="pagination" @paginate="fetchBooks" />
    <Modal
      :categories="categories"
      @get-categories="getCategories"
      @create-book="createBook"
    />
  </main>
</template>

<script>
import MainHeader from "@/components/MainHeader";
import MainBooksActions from "@/components/MainBooksActions";
import DataTable from "@/components/DataTable";
import VPagination from "@/components/VPagination";
import Modal from "@/components/Modal";
import { mutations } from "../store";
import axios from "axios";

export default {
  name: "Main",
  data() {
    return {
      books: [],
      categories: [],
      pagination: {}
    };
  },

  components: {
    MainHeader,
    MainBooksActions,
    DataTable,
    VPagination,
    Modal
  },

  methods: {
    setShowAutoComplete: mutations.setShowAutoComplete,
    setShowCreateModal: mutations.setShowCreateModal,
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
    },

    async getCategories(query) {
      this.setShowAutoComplete(true);
      query = query.length > 0 ? query : null;
      try {
        const resCategories = await axios.get(
          `http://localhost:8000/api/categories?search=${query}`
        );
        // const resCategories = await axios.get(`http://localhost:8000/api/categories?search=""`)
        this.categories = resCategories.data.data;
        console.log("Categories", query);
      } catch (error) {
        this.setShowCreateModal(false);
        console.log(error);
      }
    },

    async createBook(book) {
      try {
        let resCreateBook = await axios.post(
          "http://localhost:8000/api/books",
          book
        );
        this.setShowCreateModal(false);
        this.fetchBooks();
        book.name = "";
        console.log(resCreateBook);
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
