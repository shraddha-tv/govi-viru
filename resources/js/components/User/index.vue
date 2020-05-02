<template>
  <div>
    <user-table></user-table>
    <user-dialog></user-dialog>
  </div>
</template>

<script>
import table from './UserTable'
import dialog from './UserDialog'
export default {
  components:{
    "user-table":table,
    "user-dialog":dialog
  }
}
</script>