<template>
  <div>
    <custom-table title="User Table" :items="userList" :headers="headers" :dialogFun="setDialog"
      :editFun="editItem"
      :deleteFun="deleteItem"
      :viewFun="viewItem"
></custom-table>
    <!-- <v-card-title class="grey">
      <v-layout class="white--text">
        User Table
        <v-divider vertical class="mx-2 my-2 light-green accent-3"></v-divider>
        <span v-if="userList.meta" class="body-2 font-weight-bold my-auto">
          Total :
          <b class="lime--text">{{userList.meta.total}}</b>
        </span>
        <v-spacer></v-spacer>
        <v-btn color="success" @click="setDialog">
          <v-icon color="white">add</v-icon>Add New
        </v-btn>
      </v-layout>
    </v-card-title>
    <v-card-text>
      <v-data-table :headers="headers" :items="userList.data" hide-default-footer>
        <template v-slot:item.action="{ item }">
          <v-btn small icon @click="editItem(item)">
            <v-icon small>edit</v-icon>
          </v-btn>
          <v-btn small icon @click="deleteItem(item.id)">
            <v-icon small>delete</v-icon>
          </v-btn>
        </template>
      </v-data-table>
    </v-card-text>
    <v-card-actions class="grey lighten-1">
         <v-pagination v-model="page" :length="pageCount" color="green"></v-pagination>
    </v-card-actions>-->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data: () => ({
    page: 1,
    headers: [
      { text: "ID", value: "id" },
      { text: "NAME", value: "name" },
      { text: "MOBILE", value: "phoneNo" },
      { text: "ADDRESS", value: "address" },
      { text: "ROLE", value: "roleName" },
      { text: "ACTION", value: "action", sortable: false, align: "right"}
    ]
  }),
  watch: {
    page(val) {
      this.loadUsers(this.page);
    }
  },
  created() {
    this.loadUsers(this.page);
  },
  computed: {
    ...mapGetters({
      userList: "user/getUserList"
    }),
    pageCount() {
      if (this.userList.meta) {
        var data = this.userList.meta;
        return data.last_page;
      } else {
        return 1;
      }
    }
  },
  methods: {
    ...mapActions({
      loadUsers: "user/get_user_list",
      setDialog: "user/toggle_dialog",
      setEditItem: "user/set_edit_item",
      deleteUser: "user/delete_user"
    }),
    viewItem(id){
      this.$router.push({ path: `/users/${id}` })
    },
    editItem(item) {
      this.setDialog();
      this.setEditItem(item);
    },
    deleteItem(id) {
      if (confirm("Do you really want to delete?")) {
        this.deleteUser(id);
      }
    }
  }
};
</script>