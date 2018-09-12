<template>
    <div>
        <h1>Update Product</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayProduct' }" class="btn btn-success">Return to Products</router-link></div>
        </div>

        <form v-on:submit.prevent="updateProduct">
            <div class="form-group">
                <label>Supplier Id</label>
                <input type="number" min="1" class="form-control" v-model="product.supplier_id" >
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                product:{}
            }
        },

        created: function(){
            this.getProduct();
        },

        methods: {
            getProduct()
            {
              let uri = `http://localhost:8000/api/product/${this.$route.params.id}`;
               fetch(uri)
              .then(res => res.json())
              .then(res => {
                  this.product = res.data;
                  console.log(this.product);
              }); 

            },

            updateProduct(id)
            {
              let uri = 'http://localhost:8000/api/product/'+this.$route.params.id;
             fetch(uri,{
                    method: 'put',

                    mode: "cors",
                    body: JSON.stringify(this.product), 

                    headers: {
                          'Content-Type': 'application/json', 
                    },
                    

                    })
                   .then(res => res.json())
                   .then(data => {
                        this.$router.push({name: 'DisplayProduct'});
                                this.$notify({
                                    group: 'foo',
                                    title: 'Important Message',
                                    text: 'Product Updated!'
                                });
                   })
                   .catch(err => console.log(err));
                }
            }
        }

       
</script>