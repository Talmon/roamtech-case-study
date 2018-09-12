<template>
    <div>
        <h1>Suppliers</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateSupplier' }" class="btn btn-primary">Create Supplier</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <td>Supplier Id</td>
                <td>Delivery Id</td>
                <td>Delivery Date</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="supplier in suppliers" v-bind:key="supplier.id">
                    <td>{{ supplier.supplier_id }}</td>
                    <td>{{ supplier.delivery_id }}</td>
                    <td>{{ supplier.delivery_date }}</td>
                    <td><router-link :to="{name: 'EditSupplier', params: { id: supplier.supplier_id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click="deleteSupplier(supplier.supplier_id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        data(){
            return{
                suppliers: []
            }
        },

        created: function()
        {
            this.fetchSuppliers();
        },

        methods: {
            fetchSuppliers()
            {
              let uri = 'http://localhost:8000/api/supplier';
              fetch(uri)
              .then(res => res.json())
              .then(res => {
                  this.suppliers = res.data
              }); 
            },
            deleteSupplier(id)
            {
            
                if(confirm('Are You Sure?')){
                   fetch(`api/supplier/${id}`,{
                    method: 'delete' 
                   })
                   .then(res => res.json())
                   .then(data => {
                       this.fetchSuppliers();
                        this.$notify({
                            group: 'foo',
                            title: 'Important Message',
                            text: 'Supplier Deleted!'
                        });
                   })
                   .catch(err => console.log(err));
                }
            }
        }
    }
</script>