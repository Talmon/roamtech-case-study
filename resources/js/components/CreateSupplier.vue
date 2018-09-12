<template>
  <div>
    <h1>Create A Supplier</h1>
    <form v-on:submit.prevent="addSupplier">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Delivery Id:</label>
            <input type="number" min="1" class="form-control" v-model="supplier.delivery_id">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Delivery Date:</label>
              <input type="date" class="form-control col-md-6" v-model="supplier.delivery_date" />
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Add Supplier</button>
        </div>
    </form>
  </div>
</template>
<script>
  export default {
    data(){
        return{
          supplier:{}
        }
    },
    methods: {
      addSupplier(){
        let uri = 'http://localhost:8000/api/supplier';
        this.axios.post(uri, this.supplier).then((response) => {
          this.$router.push({name: 'DisplaySupplier'});
           this.$notify({
              group: 'foo',
              title: 'Important Message',
              text: 'Supplier Created!'
           });
          
        })
    }
  }
}
</script>