<template>
  <div>
    <h1>Create A Product</h1>
    <form v-on:submit.prevent="addProduct">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Supplier Id:</label>
            <input type="number" min="1" class="form-control" v-model="product.supplier_id">
          </div>
        </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Add Product</button>
        </div>
    </form>
  </div>
</template>
<script>
  export default {
    data(){
        return{
          product:{}
        }
    },
    methods: {
      addProduct(){
        let uri = 'http://localhost:8000/api/product';
        this.axios.post(uri, this.product).then((response) => {
          this.$router.push({name: 'DisplayProduct'});
           this.$notify({
              group: 'foo',
              title: 'Important Message',
              text: 'Product Created!'
           });
          
        })
    }
  }
}
</script>