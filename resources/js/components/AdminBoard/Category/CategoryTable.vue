<template>
  <div>
     <custom-table
      title="Category Table"
      :items="itemList"
      :headers="headers"
      :dialogFun="toggleDialog"
      :editFun="editItem"
      :deleteFun="deleteItem"
     ></custom-table>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data: () => ({
    headers: [
      { text: "ID", value: "id" },
      { text: "NAME", value: "code" },
      { text: "DESCRIPTION", value: "description" },
      { text: "STATE", value: "state" },
      { text: "ACTION", value: "action", sortable: false, align: "right"}
    ]
  }),
  created() {
    this.loadData();
  },
  computed: {
    ...mapGetters({
      itemList: "category/getCategory"
    })
  },
  methods: {
    ...mapActions({
      loadData: "category/get_category_list",
      toggleDialog: "category/toggle_dialog",
      setEditItem: "category/set_edit_item",
      deleteVege: "category/delete_category",
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