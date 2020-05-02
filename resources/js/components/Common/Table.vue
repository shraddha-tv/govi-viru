<template>
  <v-card class="ma-3">
    <v-card-title class="grey">
      <v-layout class="white--text">
        {{title}}
        <v-divider vertical class="mx-2 my-2 light-green accent-3"></v-divider>
        <span v-if="items.meta" class="body-2 font-weight-bold my-auto">
          Total :
          <b class="lime--text">{{items.meta.total}}</b>
        </span>
        <v-spacer></v-spacer>
        <v-btn v-if="dialogFun" :class="`${default_color} white--text`" @click="dialogFun">
          <v-icon color="white">add</v-icon>Add New
        </v-btn>
      </v-layout>
    </v-card-title>
    <v-card-text>
      <v-data-table :headers="headers" :items="items.data" hide-default-footer>
        <template v-slot:item.action="{ item }">
          <v-btn v-if="viewFun" small icon @click="viewFun(item.id)">
            <v-icon small>visibility</v-icon>
          </v-btn>
          <v-btn v-if="editFun" small icon @click="editFun(item)">
            <v-icon small>edit</v-icon>
          </v-btn>
          <v-btn v-if="deleteFun" small icon @click="deleteFun(item.id)">
            <v-icon small>delete</v-icon>
          </v-btn>
        </template>
      </v-data-table>
    </v-card-text>
    <v-card-actions class="grey lighten-1">
         <v-pagination v-model="page" :length="pageCount" :color="default_color"></v-pagination>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props:{
    title:{ type:String, default:"No Title"},
    items:[Object,Array],
    headers:Array,
    dialogFun: Function,
    editFun: Function,
    deleteFun: Function,
    viewFun: Function,
  },
  data: () => ({
    page:1,
    default_color : "green"
  }),
  watch:{
    page(val){
      // this.loadUsers(this.page)
    }
  },
  computed: {
    pageCount(){
      if(this.items.meta){
        var data = this.items.meta;
        return data.last_page
      }else{
        return 1
      }
    }
  }
};
</script>