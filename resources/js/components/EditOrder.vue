<template>
    <div>
        <h1>Update Order</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayOrder' }" class="btn btn-success">Return to Orders</router-link></div>
        </div>

        <form v-on:submit.prevent="updateOrder">
            <div class="form-group">
                <label>Order Date</label>
                <input type="date" min="1" class="form-control" v-model="order.order_date" >
            </div>

            <div class="form-group">
                <label>Headquarters Id</label>
                <input type="number" min="1" class="form-control" v-model="order.headquarters_id">  
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
                order:{}
            }
        },

        created: function(){
            this.getOrder();
        },

        methods: {
            getOrder()
            {
              let uri = `http://localhost:8000/api/order/${this.$route.params.id}`;
               fetch(uri)
              .then(res => res.json())
              .then(res => {
                  this.order = res.data;
                  console.log(this.order);
              }); 

            },

            updateOrder(id)
            {
              let uri = 'http://localhost:8000/api/order/'+this.$route.params.id;
             fetch(uri,{
                    method: 'put',

                    mode: "cors",
                    body: JSON.stringify(this.order), 

                    headers: {
                          'Content-Type': 'application/json', 
                    },
                    
                    })
                   .then(res => res.json())
                   .then(data => {
                       console.log(data);
                        this.$router.push({name: 'DisplayOrder'});
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