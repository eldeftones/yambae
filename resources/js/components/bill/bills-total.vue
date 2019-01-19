<template>
    <div class="bills-total">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Rapport</h1>

                <!-- FILTERS -->
                <div class="card mb-5">
                      <div class="card-header">Filtres</div>
                      <div class="card-body">

                          <!-- PRODUCT TYPE -->
                          <div class="form-group row">
                              <label class="col-md-2 control-label">Produit</label>
                              <div class="col-md-4">
                                  <select class="form-control input-md" v-model="productId">
                                      <option :value="null"></option>
                                      <option v-for="product in products" :value="product.id">{{ product.label }}</option>
                                  </select>
                              </div>
                          </div>

                          <!-- SESSION-->
                          <div class="form-group row">
                              <label class="col-md-2 control-label">Session</label>
                              <div class="col-md-4">
                                  <select class="form-control input-md" v-model="sessionId">
                                      <option :value="null"></option>
                                      <option v-for="session in sessions" :value="session.id">{{ session.label }}</option>
                                  </select>
                              </div>
                          </div>

                          <!-- LEVEL-->
                          <div class="form-group row">
                              <label class="col-md-2 control-label">Niveau</label>
                              <div class="col-md-4">
                                  <select class="form-control input-md" v-model="levelId" >
                                      <option :value="null"></option>
                                      <option v-for="level in levels" :value="level.id">{{ level.label }}</option>
                                  </select>
                              </div>
                          </div>

                          <!-- SEARCH BUTTON -->
                          <div class="form-group row">
                              <div class="offset-md-2 col-md-4">
                                  <button type="button" class="btn btn-success" @click="getTotals">
                                      <span class="oi oi-magnifying-glass"></span>
                                      Calculer
                                  </button>
                              </div>
                          </div>

                      </div>
                </div>

                <!-- BILLS TOTAL -->
                <table v-if="results && results.length" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nom produit</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="res in results">
                            <td>{{ res.product_label }}</td>
                            <td>{{ res.total }}</td>
                        </tr>
                  </tbody>
                </table>
                <div v-else class="alert alert-danger" role="alert">
                    Aucun résultat !
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
            // Data
            results: null,
            products: null,
            sessions: null,
            levels: null,
            // Filters
            productId: null,
            sessionId: null,
            levelId: null,
        }
    },

    created() {
        this.fetchProducts()
        this.fetchSessions()
        this.fetchLevels()
        this.getTotals()
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

        fetchSessions() {
            axios.get(`/api/sessions`).then(results => {
                this.sessions = results.data
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

        getTotals() {
            let params = {
                product_id: this.productId,
                session_id: this.sessionId,
                level_id: this.levelId,
            }

            axios.post(`/api/bills/total`, params).then(results => {
                this.results = results.data
            }, error => {
                console.error(error)
            })
        },

    },

}
</script>

<style lang="scss">
.bills-total {
    h1 {
        margin: 30px 0 50px 0;
    }

}
</style>
