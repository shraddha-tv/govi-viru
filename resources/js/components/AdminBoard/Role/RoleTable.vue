<template>
  <div>
     <custom-table
      title="Role Table"
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
      { text: "NAME", value: "name" },
      { text: "STATE", value: "state" },
      { text: "ACTION", value: "action", sortable: false, align: "right"}
    ]
  }),
  created() {
    this.loadData();
  },
  computed: {
    ...mapGetters({
      itemList: "role/getRoles"
    })
  },
  methods: {
    ...mapActions({
      loadData: "role/get_roles_list",
      toggleDialog: "role/toggle_dialog",
      setEditItem: "role/set_edit_item",
      deleteVege: "role/delete_role",
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