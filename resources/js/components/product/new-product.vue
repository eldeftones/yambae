<template>
    <div class="new-product">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Nouveau produit</h1>

                <!-- MESSAGES -->
                <div v-if="message">
                    <div class="alert alert-success" role="alert">
                        <strong>Yeah !</strong> {{ message }}
                    </div>
                    <a href="/new-product" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Nouveau produit
                    </a>
                    <a href="/list-products" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Liste des produits</a>
                </div>

                <!-- NEW PRODUCT FORM -->
                <div v-else class="card card-default">
                    <div class="card-header">Nouveau produit</div>

                    <div class="card-body">

                        <!-- LABEL -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="label">Nom</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" v-model="product.label" id="label" />
                            </div>
                        </div>

                        <!-- CATEGORY -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Catégorie</label>
                            <div class="col-md-4">
                                <select class="form-control input-md" v-model="product.category_id" >
                                    <option value="-">Choisissez une catégorie</option>
                                    <option v-for="category in categories" :value="category.id">{{ category.label }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- PRICE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="price">Prix</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="product.price" id="price" />
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="description">Description</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" v-model="product.description" id="description" />
                            </div>
                        </div>

                        <!-- SAVE BUTTON -->
                        <div class="form-group row">
                            <div class="col-md-10">
                                <button type="button" class="btn btn-success" @click="createProduct">Créer</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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
            message: '',
            errors: '',
            categories: null,
            product: {
                label: '',
                category_id: '-',
                price: '',
                description: '',
            },
        }
    },

    created() {
        this.fetchCategories()
    },

    computed: {

    },

    methods: {

        fetchCategories() {
            axios.get(`/api/categories`).then(results => {
                this.categories = results.data
            }, error => {
                console.error(error)
            })
        },

        createProduct() {
            this.product.created_at = moment(this.product.created_at).format('YYYY-MM-DD')

            axios.post(`/api/product/new`, this.product).then(results => {
                this.message = results.data.message
            }, error => {
                this.errors = results.data.message
            })
        },

    },

}
</script>

<style lang="scss">
.new-product {
    h1 {
        margin: 30px 0 50px 0;
    }
}
</style>
