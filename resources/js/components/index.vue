<template>
  <v-app id="inspire">
    <navigation-bar></navigation-bar>
  <app-bar></app-bar>
  <snack-bar></snack-bar>
    <v-content>
       <router-view/>
    </v-content>
  </v-app>
</template>

<script>
import navigation from './_Sub/NavigationBar'
import appBar from './_Sub/AppBar'
import snackBar from './_Sub/SnackBar'
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
    components:{
      "navigation-bar":navigation,
      "app-bar":appBar,
      "snack-bar":snackBar
    }
  }
</script>