<template>
  <div>
    <role-table></role-table>
    <role-dialog></role-dialog>
  </div>
</template>

<script>
import table from './RoleTable'
import dialog from './RoleDialog'

export default {
  components:{
    "role-table":table,
    "role-dialog":dialog
  }
}
</script>

<style>

</style>