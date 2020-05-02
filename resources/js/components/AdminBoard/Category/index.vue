<template>
  <div>
    <category-table></category-table>
    <category-dialog></category-dialog>
  </div>
</template>

<script>
import table from './CategoryTable'
import dialog from './CategoryDialog'

export default {
  components:{
    "category-table":table,
    "category-dialog":dialog
  }
}
</script>

<style>

</style>