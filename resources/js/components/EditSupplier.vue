<template>
    <div>
        <h1>Update Supplier</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplaySupplier' }" class="btn btn-success">Return to Suppliers</router-link></div>
        </div>

        <form v-on:submit.prevent="updateSupplier">
            <div class="form-group">
                <label>Delivery Id</label>
                <input type="number" min="1" class="form-control" v-model="supplier.delivery_id" >
            </div>

            <div class="form-group">
                <label>Delivery Date</label>
                <input type="date" class="form-control" v-model="supplier.delivery_date">
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
                supplier:{}
            }
        },

        created: function(){
            this.getSupplier();
        },

        methods: {
            getSupplier()
            {
              let uri = `http://localhost:8000/api/supplier/${this.$route.params.id}`;
               fetch(uri)
              .then(res => res.json())
              .then(res => {
                  this.supplier = res.data;
              }); 

            },

            updateSupplier(id)
            {
              let uri = 'http://localhost:8000/api/supplier/'+this.$route.params.id;
             fetch(uri,{
                    method: 'put',

                    mode: "cors",
                    body: JSON.stringify(this.supplier), 

                    headers: {
                          'Content-Type': 'application/json', 
                    },
                    

                    })
                   .then(res => res.json())
                   .then(data => {
                        this.$router.push({name: 'DisplaySupplier'});
                         this.$notify({
                            group: 'foo',
                            title: 'Important Message',
                            text: 'Supplier Updated!'
                         });
                   })
                   .catch(err => console.log(err));
                }

            }

            
        }
</script>