<template>
    <div class="edit-bill">

        <vue-snotify></vue-snotify>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>{{ title }}</h1>

                <!-- MESSAGES -->
                <div v-if="message">
                    <div class="alert alert-success" role="alert">
                        <strong>Yeah !</strong> {{ message }}
                    </div>
                    <a :href="'/student/'+studentId+'/new-bill'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Nouvelle facture pour cet élève
                    </a>
                    <a :href="'/student/'+studentId+'/list-bills'"  class="btn btn-success btn-lg active" role="button" aria-pressed="true">
                        <span class="oi oi-list"></span>
                        Liste des factures de cet élève
                    </a>
                </div>

                <!-- NEW/EDIT BILL FORM -->
                <div v-else class="card card-default">
                    <div class="card-header">{{ title }}</div>

                    <div class="card-body">

                        <!-- PRODUCT TYPE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Produit*</label>
                            <div class="col-md-4">
                                <select class="form-control input-md" v-model="bill.product_id" @change="updatePrice">
                                    <option v-for="product in products" :value="product.id">{{ product.label + ' (' + product.price + '$)' }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- LEVEL-->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Niveau</label>
                            <div class="col-md-4">
                                <select class="form-control input-md" v-model="bill.level_id" >
                                    <option v-for="level in levels" :value="level.id">{{ level.label }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- SESSION-->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Session</label>
                            <div class="col-md-4">
                                <select class="form-control input-md" v-model="bill.session_id" >
                                    <option v-for="session in sessions" :value="session.id">{{ session.label }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- PRICE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="price">Prix*</label>
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
                            <label class="col-md-2 control-label">Date*</label>
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
                                <button type="button" class="btn btn-success" @click="saveBill">Sauvegarder</button>
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
        'billId',
    ],

    data() {
        return {
            message: '',
            errors: '',
            products: null,
            levels: null,
            sessions: null,
            bill: {
                id: this.billId,
                student_id: this.studentId,
                product_id: '',
                level_id: '',
                session_id: '',
                comment: '',
                price: '',
                refunded: false,
                created_at: new Date(),
            },
        }
    },

    created() {
        this.fetchProducts()
        this.fetchLevels()
        this.fetchSessions()
        if (this.bill.id !== 'new') {
            this.fetchBill()
        }
    },

    computed: {

        title() {
            return this.bill.id == 'new' ? 'Nouvelle facture' : 'Modification d\'une facture'
        },

    },

    methods: {

        fetchBill() {
            axios.get(`/api/bill/${this.bill.id}`).then(results => {
                this.bill = results.data
            }, error => {
                console.error(error)
            })
        },

        fetchProducts() {
            axios.get(`/api/products`).then(results => {
                this.products = results.data
            }, error => {
                console.error(error)
            })
        },

        fetchLevels() {
            axios.get(`/api/levels`).then(results => {
                this.levels = results.data
            }, error => {
                console.error(error)
            })
        },

        fetchSessions() {
            axios.get(`/api/sessions`).then(results => {
                this.sessions = results.data
            }, error => {
                console.error(error)
            })
        },

        updatePrice() {
            this.bill.price = _.find(this.products, {'id': this.bill.product_id}).price
        },

        saveBill() {
            this.bill.created_at = moment(this.bill.created_at).format('YYYY-MM-DD')

            axios.post(`/api/bill/save`, this.bill).then(results => {
                this.message = results.data.message
                // TODO
                // this.$snotify.success(this.message, {
                //   timeout: 2000,
                //   showProgressBar: false,
                //   closeOnClick: false,
                //   pauseOnHover: true
                // });
            }, error => {
                this.errors = error.response.data.errors
            })
        },

    },

}
</script>

<style lang="scss">
.edit-bill {
    h1 {
        margin: 30px 0 50px 0;
    }
}
</style>
