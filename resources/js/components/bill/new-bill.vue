<template>
    <div class="new-bill">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Nouvelle facture</h1>

                <!-- MESSAGES -->
                <div v-if="message">
                    <div class="alert alert-success" role="alert">
                        <strong>Yeah !</strong> {{ message }}
                    </div>
                    <a :href="'/student/'+studentId+'/new-bill'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Créer une nouvelle facture pour cet élève</a>
                    <a href="/list-students" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Voir la liste des élèves</a>
                </div>

                <!-- NEW BILL FORM -->
                <div v-else class="card card-default">
                    <div class="card-header">Nouvelle facture</div>

                    <div class="card-body">

                        <!-- PRODUCT TYPE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Produit</label>
                            <div class="col-md-4">
                                <select class="form-control input-md" v-model="bill.product_id" @change="updatePrice">
                                    <option v-for="product in products" :value="product.id">{{ product.label + ' (' + product.price + '$)' }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- PRICE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="price">Prix</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="bill.price" id="price" />
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COMMENT -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="comment">Commentaire</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" v-model="bill.comment" id="comment" />
                            </div>
                        </div>

                        <!-- ENTRY DATE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                 <date-picker
                                    v-model="bill.created_at"
                                    lang="fr"
                                    type="date"
                                />
                            </div>
                        </div>

                        <!-- SAVE BUTTON -->
                        <div class="form-group row">
                            <div class="col-md-10">
                                <button type="button" class="btn btn-success" @click="createBill">Créer</button>
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
        'studentId',
    ],

    data() {
        return {
            message: '',
            errors: '',
            products: null,
            bill: {
                student_id: this.studentId,
                product_id: '',
                comment: '',
                price: '',
                refunded: false,
                created_at: new Date(),
            },
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

        updatePrice() {
            this.bill.price = _.find(this.products, {'id': this.bill.product_id}).price
        },

        createBill() {

            this.bill.created_at = moment(this.bill.created_at).format('YYYY-MM-DD')

            axios.post(`/api/bill/new`, this.bill).then(results => {
                this.message = results.data.message
            }, error => {
                this.errors = results.data.message
            })
        },

    },

}
</script>

<style lang="scss">
.new-bill {
    h1 {
        margin: 30px 0 50px 0;
    }
}
</style>
