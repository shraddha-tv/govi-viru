<template>
  <v-snackbar v-model="snackbar" top color="green">
    {{ text }}
    <v-btn color="white" text @click="snackbar = false">Close</v-btn>
  </v-snackbar>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data:()=>({
    snackbar:false
  }),
  computed: {
    ...mapGetters({
      item : 'getMessage'
    }),
    text(){
      if(this.item.message){
        this.snackbar = true
      return this.item.message;
      }
    }
  }
};
</script>