<template>
    <div class="list-products">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>
                    Liste des produits
                    <a href="/new-product" class="btn btn-primary btn-title btn-md active" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Créer un nouveau produit
                    </a>
                </h1>

                <!-- NO PRODUCTS ALERT -->
                <div v-if="!products.length" class="alert alert-warning" role="alert">
                    Aucun produit pour le moment !
                </div>

                <!-- PRODUCTS LIST -->
                <table v-else class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products">
                            <th scope="row">{{ product.id }}</th>
                            <td>{{ product.label }}</td>
                            <td>{{ product.price }}</td>
                            <td>{{ product.description }}</td>
                        </tr>
                  </tbody>
                </table>
            </div>

        </div>
    </div>
</template>

<script>
import moment from 'moment'

export default {
    props: [
    ],

    data() {
        return {
            products: [],
        }
    },

    created() {
        this.fetchProducts()
    },

    computed: {

    },

    methods: {

        fetchProducts() {

            axios.get(`/api/products`).then(results => {
                this.products = results.data
            }, error => {
                console.error(error)
            })
        },

    },

}
</script>

<style lang="scss">
.list-products {
    h1 {
        margin: 30px 0 50px 0;
    }

    .btn-title {
        float: right;
    }
}
</style>
