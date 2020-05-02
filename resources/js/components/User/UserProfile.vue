<template>
  <div>
      <v-app-bar flat>
          {{user.user.name}}
      </v-app-bar>
      <v-flex ma-3>
    <v-data-table :items="user.vegeList" :headers="headers"></v-data-table>
      </v-flex>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data: () => ({
      headers: [
      { text: "ID", value: "id" },
      { text: "FARMER", value: "farmerId" },
      { text: "VEG ID", value: "vegId" },
      { text: "GRADE", value: "grade" },
      { text: "RATE", value: "rate" },
      { text: "QUENTITY", value: "quantity" },
      { text: "FREE QUENTITY", value: "freeQuantity" },
      { text: "DATE", value: "date" },
    //   { text: "ACTION", value: "action", sortable: false, align: "right" }
    ]
  }),
  created(){
      this.loadProfile(this.$route.params.id)
  },
  computed: {
    ...mapGetters({
      user: "user/getActiveItem"
    })
  },
  methods:{
      ...mapActions({
          loadProfile : 'user/get_user_details'
      })
  }
};
</script>