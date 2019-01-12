<template>
    <div class="list-bills">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>
                    {{ title }}
                    <a :href="'/student/'+studentId+'/new-bill'" class="btn btn-primary btn-title btn-md active" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Nouvelle facture pour cet élève
                    </a>
                </h1>

                <!-- NO BILLS ALERT -->
                <div v-if="!bills.length" class="alert alert-warning" role="alert">
                    Aucune facture pour cet élève !
                </div>

                <!-- BILLS LIST -->
                <table v-else class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Label produit</th>
                            <th scope="col">Session</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="bill in bills">
                            <th scope="row">{{ bill.id }}</th>
                            <td>{{ bill.product_label }}</td>
                            <td>{{ bill.session_label }}</td>
                            <td>{{ bill.level_label }}</td>
                            <td>{{ bill.price }}</td>
                            <td>{{ bill.comment }}</td>
                            <td>{{ bill.created_at }}</td>
                            <td>
                                <a :href="'/bill/'+bill.id+'/edit'" class="btn btn-success btn-sm active" role="button" aria-pressed="true">
                                    <span class="oi oi-pencil"></span>
                                    Éditer
                                </a>
                            </td>
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
        'studentId',
    ],

    data() {
        return {
            bills: [],
        }
    },

    created() {
        this.fetchBills()
    },

    computed: {

        title() {
            return this.bills.length ? 'Factures de ' + this.bills[0].student.fullname : 'Factures'
        },

    },

    methods: {

        fetchBills() {
            axios.get(`/api/student/${this.studentId}/bills`).then(results => {
                this.bills = results.data
            }, error => {
                console.error(error)
            })
        },

    },

}
</script>

<style lang="scss">
.list-bills {
    h1 {
        margin: 30px 0 50px 0;
    }

    .btn-title {
        float: right;
    }
}
</style>
