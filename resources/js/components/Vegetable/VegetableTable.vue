<template>
  <div>
     <custom-table
      title="Vege Table"
      :items="itemList"
      :headers="headers"
      :dialogFun="toggleDialog"
      :editFun="editItem"
      :deleteFun="deleteItem"
     ></custom-table>
    <!-- <v-card-title class="grey">
      <v-layout class="white--text">
        Vegetable List
        <v-spacer></v-spacer>
        <v-btn color="primary" @click="toggleDialog">
          <v-icon color="white">add</v-icon>Add New
        </v-btn>
      </v-layout>
    </v-card-title>
    <v-card-text>
      <v-data-table :items="itemList" :headers="headers"></v-data-table>
    </v-card-text> -->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data: () => ({
    headers: [
      { text: "ID", value: "id" },
      { text: "FARMER", value: "farmer" },
      { text: "VEG ID", value: "vegeName" },
      { text: "GRADE", value: "grade" },
      { text: "RATE", value: "rate" },
      { text: "QUENTITY", value: "quantity" },
      { text: "FREE QUENTITY", value: "freeQuantity" },
      { text: "DATE", value: "date" },
      { text: "ACTION", value: "action", sortable: false, align: "right" }
    ]
  }),
  created() {
    this.loadData();
  },
  computed: {
    ...mapGetters({
      itemList: "vegetable/getVegetableList"
    })
  },
  methods: {
    ...mapActions({
      loadData: "vegetable/get_vegetable_list",
      toggleDialog: "vegetable/toggle_dialog",
      setEditItem: "vegetable/set_edit_item",
      deleteVege: "vegetable/delete_vegetable",
    }),
    editItem(item) {
      this.toggleDialog();
      this.setEditItem(item);
    },
    deleteItem(id) {
      if (confirm("Do you really want to delete?")) {
        this.deleteVege(id);
      }
    }
  }
};
</script>

<style>
</style>