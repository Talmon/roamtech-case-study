<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#">Roamtech Case Study</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <router-link class="nav-link text-light" :to="{ name: 'DisplaySupplier' }" >Suppliers</router-link>
            </li>
            <li class="nav-item">
                 <router-link class="nav-link text-light" :to="{ name: 'DisplayProduct' }" >Products</router-link>
            </li>
            <li class="nav-item">
                 <router-link class="nav-link text-light" :to="{ name: 'DisplayOrder' }" >Orders</router-link>
            </li>
            </ul>
        </div>
        </nav>
        <div>

            <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name:Talmon Mwakesi Mwazo</li>
                <li class="list-group-item">Email: talimwakesi@gmail.com</li>
                <li class="list-group-item">Mobile No: 0727136485</li>
            </ul>
            </div>
                <h1 class="display-4 mt-1">RoamTech Interview Case Study</h1>
                <hr>
                <p class="lead">Click on any of the links above to navigate through the app.</p>
            </div>
            </div>

            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>

        <notifications group="foo" />
    </div>

    
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{
    }
</script>