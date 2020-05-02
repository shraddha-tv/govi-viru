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
              <v-text-field prepend-icon="person" label="Name" v-model="item.name"></v-text-field>
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
      name: ""
    }
  }),
  watch: {
    editItem(val) {
      val.id && Object.assign(this.item, val);
    }
  },
  computed: {
    ...mapGetters({
      dialog: "role/getDialog",
      editItem: "role/getEditItem"
    })
  },
  methods: {
    ...mapActions({
      toggleDialog: "role/toggle_dialog",
      setEditItem: "role/set_edit_item",
      addNewVege: "role/add_new_role",
      updateVege: "role/update_role",
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
        name: ""
      };
      this.$refs.form.resetValidation();
      this.setEditItem(this.item);
    }
  }
};
</script>