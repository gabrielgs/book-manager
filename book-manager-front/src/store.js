import Vue from "vue";

export const state = Vue.observable({
  showAutoComplete: false,
  showCreateModal: false
});

export const getters = {
  showAutoComplete: () => state.showAutoComplete,
  showCreateModal: () => state.showCreateModal
};

export const mutations = {
  setShowAutoComplete: val => (state.showAutoComplete = val),
  setShowCreateModal: val => (state.showCreateModal = val)
};
