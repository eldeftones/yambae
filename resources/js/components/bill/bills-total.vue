<template>
    <div class="bills-total">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Rapport</h1>

                <!-- BILLS TOTAL -->
                <table v-if="results" class="table table-striped table-hover">
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
            results: null,
        }
    },

    created() {
        this.fetchTotals()
    },

    computed: {

    },

    methods: {

        fetchTotals() {

            axios.get(`/api/bills/total`).then(results => {
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
