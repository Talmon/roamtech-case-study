<template>
    <div>
        <h1>Products</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateProduct' }" class="btn btn-primary">Create Product</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <td>Product Id</td>
                <td>Supplier Id</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="product in products" v-bind:key="product.id">
                    <td>{{ product.product_id }}</td>
                    <td>{{ product.supplier_id }}</td>
                    <td><router-link :to="{name: 'EditProduct', params: { id: product.product_id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click="deleteProduct(product.product_id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                products: []
            }
        },

        created: function()
        {
            this.fetchProducts();
        },

        methods: {
            fetchProducts()
            {
              let uri = 'http://localhost:8000/api/product';
              fetch(uri)
              .then(res => res.json())
              .then(res => {
                  this.products = res.data
              }); 
            },
            deleteProduct(id)
            {
            
                if(confirm('Are You Sure?')){
                   fetch(`api/product/${id}`,{
                    method: 'delete' 
                   })
                   .then(res => res.json())
                   .then(data => {
                       this.fetchProducts();
                        this.$notify({
                            group: 'foo',
                            title: 'Important Message',
                            text: 'Product Deleted!'
                        });
                   })
                   .catch(err => console.log(err));
                }
            }
        }
    }
</script>