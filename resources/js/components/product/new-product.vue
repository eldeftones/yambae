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
                    <a href="/new-product" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Créer un nouveau produit</a>
                    <a href="/list-products" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Voir la liste des produits</a>
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
            product: {
                label: '',
                price: '',
                description: '',
            },
        }
    },

    computed: {

    },

    methods: {

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
