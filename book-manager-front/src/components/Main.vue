<template>
  <main>
    <MainHeader />
    <MainBooksActions />
    <DataTable :books="books" @open-modal-edit="openModalEdit" />
    <VPagination :pagination="pagination" @paginate="fetchBooks" />
    <Modal
      :categories="categories"
      @get-categories="getCategories"
      @create-book="createBook"
    />
    <ModalEdit>
      <template slot="modal-body">
        <form>
          <div class="mb-4">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Name"
              v-model="bookToEdit.name"
            />
          </div>
          <div class="mb-4">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Author"
              v-model="bookToEdit.author"
            />
          </div>
          <div class="mb-4 relative">
            <select
              v-model="bookToEdit.status"
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-state"
            >
              <option disabled value="">Status</option>
              <option value="Available">Available</option>
              <option value="Not Available">Not Available</option>
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
              v-model="bookToEdit.publication_date"
            />
          </div>
          <div class="mb-4 relative">
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white"
              type="text"
              placeholder="Category"
              v-model="query"
              @keyup="getCategories(query)"
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
      </template>
      <template slot="modal-footer">
        <div class="flex justify-between">
          <button
            class="btn border border-green-300 border-solid hover:border-green-600  rounded px-10 py-2"
            @click="setShowEditModal(false)"
          >
            Cancel
          </button>
          <button
            class="btn bg-green-500 hover:bg-green-700 text-white rounded px-10 py-2"
            @click="updateBook"
          >
            Update
          </button>
        </div>
      </template>
    </ModalEdit>
  </main>
</template>

<script>
import MainHeader from "@/components/MainHeader";
import MainBooksActions from "@/components/MainBooksActions";
import DataTable from "@/components/DataTable";
import VPagination from "@/components/VPagination";
import Modal from "@/components/Modal";
import ModalEdit from "@/components/ModalEdit";
import { getters, mutations } from "../store";
import axios from "axios";

export default {
  name: "Main",
  data() {
    return {
      books: [],
      bookToEdit: {
        name: "",
        author: "",
        status: "",
        publication_date: "",
        category: {
          id: "",
          name: ""
        }
      },
      categories: [],
      pagination: {},
      query: ""
    };
  },

  components: {
    MainHeader,
    MainBooksActions,
    DataTable,
    VPagination,
    Modal,
    ModalEdit
  },

  computed: {
    showAutoComplete() {
      return getters.showAutoComplete();
    }
  },

  methods: {
    setShowAutoComplete: mutations.setShowAutoComplete,
    setShowCreateModal: mutations.setShowCreateModal,
    setShowEditModal: mutations.setShowEditModal,
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
        this.categories = resCategories.data.data;
        console.log("Categories", query);
      } catch (error) {
        this.setShowCreateModal(false);
        console.log(error);
      }
    },

    async createBook(book) {
      try {
        await axios.post("http://localhost:8000/api/books", book);
        this.setShowCreateModal(false);
        this.fetchBooks();
        book.name = "";
      } catch (error) {
        console.log(error);
      }
    },

    chooseCategory(category) {
      this.setShowAutoComplete(false);
      this.bookToEdit.category_id = category.id;
      this.query = category.name;
    },

    openModalEdit(book) {
      this.bookToEdit = { ...book };
      const [day, month, year] = this.bookToEdit.publication_date.split("-");
      const formatedDate = [year, month, day].join("-");
      this.bookToEdit.publication_date = new Date(formatedDate)
        .toISOString()
        .substr(0, 10);
      this.query = this.bookToEdit.category.name;

      this.setShowEditModal(true);
    },

    async updateBook() {
      const { id, category, ...res } = this.bookToEdit;
      const updatedBook = {
        ...res
      };

      try {
        await axios.patch(`http://localhost:8000/api/books/${id}`, updatedBook);
        this.setShowEditModal(false);
        this.fetchBooks();
      } catch (error) {
        console.log(error);
      }

      console.log("BOOK TO UPDATE", res);
    }
  },

  mounted() {
    this.fetchBooks();
  }
};
</script>
