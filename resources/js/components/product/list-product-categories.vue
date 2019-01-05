<template>
    <div class="list-product-categories">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>
                    Catégories de produit
                    <a href="/new-product-category" class="btn btn-primary btn-title btn-md disabled" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Nouvelle catégorie
                    </a>
                </h1>

                <!-- NO CATEGORY ALERT -->
                <div v-if="!categories.length" class="alert alert-warning" role="alert">
                    Aucune catégorie pour le moment !
                </div>

                <!-- CATEGORIES LIST -->
                <table v-else class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ident</th>
                            <th scope="col">Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="category in categories">
                            <th scope="row">{{ category.id }}</th>
                            <td>{{ category.ident }}</td>
                            <td>{{ category.label }}</td>
                        </tr>
                  </tbody>
                </table>
            </div>

        </div>
    </div>
</template>

<script>

export default {
    props: [
    ],

    data() {
        return {
            categories: [],
        }
    },

    created() {
        this.fetchProducts()
    },

    computed: {

    },

    methods: {

        fetchProducts() {
            axios.get(`/api/categories`).then(results => {
                this.categories = results.data
            }, error => {
                console.error(error)
            })
        },

    },

}
</script>

<style lang="scss">
.list-product-categories {
    h1 {
        margin: 30px 0 50px 0;
    }

    .btn-title {
        float: right;
    }
}
</style>
