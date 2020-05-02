<template>
  <div>
    <vege-table></vege-table>
    <vege-dialog></vege-dialog>
  </div>
</template>

<script>
import table from './VegetableTable'
import dialog from './VegetableDialog'

export default {
  components:{
    "vege-table":table,
    "vege-dialog":dialog
  }
}
</script>

<style>

</style>