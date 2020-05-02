<template>
  <v-dialog v-model="dialog" width="500" persistent scrollable>
    <v-card>
      <v-card-title :class="`${item.id ? 'grey' :'green'} darken-4 white--text`">
        <v-layout>
          {{item.id ? "Update":"Add New"}}
          <v-spacer></v-spacer>
          <v-btn icon @click="cancel">
            <v-icon color="white">close</v-icon>
          </v-btn>
        </v-layout>
      </v-card-title>
      <v-card-text class="mt-3">
        <v-form ref="form" :valid="valid">
          <v-layout wrap>
            <v-flex xs12>
              <v-text-field prepend-icon="person" label="Name" v-model="item.code"></v-text-field>
            </v-flex>
            <v-flex xs12>
              <v-text-field prepend-icon="grid_on" label="Description" v-model="item.description"></v-text-field>
            </v-flex>
            <v-flex xs12 v-if="item.id">
              <v-text-field prepend-icon="grid_on" label="State" v-model="item.state"></v-text-field>
            </v-flex>
          </v-layout>
        </v-form>
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn text color="warning" @click="cancel">cancel</v-btn>
        <v-btn text color="success" @click="save">{{item.id ? 'Update' : 'save'}}</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data: () => ({
    valid: false,
    date1: false,
    item: {
      id: "",
      code: "",
      description: ""
    }
  }),
  watch: {
    editItem(val) {
      val.id && Object.assign(this.item, val);
    }
  },
  computed: {
    ...mapGetters({
      dialog: "category/getDialog",
      editItem: "category/getEditItem"
    })
  },
  methods: {
    ...mapActions({
      toggleDialog: "category/toggle_dialog",
      setEditItem: "category/set_edit_item",
      addNewVege: "category/add_new_category",
      updateVege: "category/update_category",
      setMessage:'set_message'
    }),
    save() {
      if (this.$refs.form.validate()) {
        if (this.item.id) {
          this.updateVege(this.item).then(response=>{
            this.setMessage(response)
            this.cancel()
          }); 
        } else {
          this.addNewVege(this.item).then(response=>{
            this.setMessage(response)
            this.cancel()
          }); 
        }
      }
    },
    cancel() {
      this.toggleDialog();
      this.item = {
        id: "",
        code: "",
        description: ""
      };
      this.setEditItem(this.item);
    }
  }
};
</script>