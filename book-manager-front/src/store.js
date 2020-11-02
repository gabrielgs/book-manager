import Vue from "vue";

export const state = Vue.observable({
  showAutoComplete: false,
  showCreateModal: false,
  showEditModal: false
});

export const getters = {
  showAutoComplete: () => state.showAutoComplete,
  showCreateModal: () => state.showCreateModal,
  showEditModal: () => state.showEditModal
};

export const mutations = {
  setShowAutoComplete: val => (state.showAutoComplete = val),
  setShowCreateModal: val => (state.showCreateModal = val),
  setShowEditModal: val => (state.showEditModal = val)
};
