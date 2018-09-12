<template>
    <div>
        <h1>Orders</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateOrder' }" class="btn btn-primary">Create Order</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <td>Order Id</td>
                <td>Order Date</td>
                <td>Headquarters Id</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="order in orders" v-bind:key="order.id">
                    <td>{{ order.order_id }}</td>
                    <td>{{ order.order_date }}</td>
                    <td>{{ order.headquarters_id }}</td>
                    <td><router-link :to="{name: 'EditOrder', params: { id: order.order_id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click="deleteOrder(order.order_id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                orders: []
            }
        },

        created: function()
        {
            this.fetchOrders();
        },

        methods: {
            fetchOrders()
            {
              let uri = 'http://localhost:8000/api/order';
              fetch(uri)
              .then(res => res.json())
              .then(res => {
                  this.orders = res.data
              }); 
            },
            deleteOrder(id)
            {
            
                if(confirm('Are You Sure?')){
                   fetch(`api/order/${id}`,{
                    method: 'delete' 
                   })
                   .then(res => res.json())
                   .then(data => {
                       this.fetchOrders();
                        this.$notify({
                            group: 'foo',
                            title: 'Important Message',
                            text: 'Order Deleted!'
                        });
                   })
                   .catch(err => console.log(err));
                }
            }
        }
    }
</script>