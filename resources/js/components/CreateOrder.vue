<template>
  <div>
    <h1>Create A Order</h1>
    <form v-on:submit.prevent="addOrder">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Order Date:</label>
            <input type="date" class="form-control" v-model="order.order_date">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Headquarters Id:</label>
              <input type="number" min="1" class="form-control col-md-6" v-model="order.headquarters_id" />
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Add Order</button>
        </div>
    </form>
  </div>
</template>
<script>
  export default {
    data(){
        return{
          order:{}
        }
    },
    methods: {
      addOrder(){
        let uri = 'http://localhost:8000/api/order';
        this.axios.post(uri, this.order).then((response) => {
          this.$router.push({name: 'DisplayOrder'});
          this.$notify({
              group: 'foo',
              title: 'Important Message',
              text: 'Order Created!'
          });      
       })
    }
  }
}
</script>