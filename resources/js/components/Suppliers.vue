<template>
<div>
  <h2> Suppliers </h2>
  <div class="card card-body" v-for="supplier in suppliers" v-bind:key="supplier.supplier_id">
    <h4>{{ supplier.delivery_id }}</h4>
    <p class="lead">{{ supplier.delivery_date }}</p>
  </div>
</div>

</template>

<script>
export default{
  data() {
    return {
      suppliers: [],
      supplier: {
        'supplier_id': '',
        'delivery_id': '',
        'delivery_date': '',
      },
      pagination: {}
    }
  },
  created(){
    this.fetchSuppliers();
  },
  methods: {
    fetchSuppliers(){
      fetch('api/supplier')
      .then(res => res.json())
      .then(res=> {
        this.suppliers = res.data;
      })
    }
  ,
   mounted() {
            console.log('Component mounted.')
        }}

}

 
</script>
