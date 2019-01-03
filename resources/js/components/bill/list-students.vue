<template>
    <div class="list-students">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- STUDENTS LIST -->
                <table v-if="students" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Date d'entrée</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students">
                            <th scope="row">{{ student.id }}</th>
                            <td>{{ student.firstname }}</td>
                            <td>{{ student.lastname }}</td>
                            <td>{{ student.created_at }}</td>
                            <td>
                                <a href="/add-bill" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Liste des factures</a>
                                <a href="/list-bills" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Ajouter une facture</a>
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
    ],

    data() {
        return {
            students: null,
        }
    },

    created() {
        this.fetchStudents()
    },

    computed: {

    },

    methods: {

        fetchStudents() {

            axios.get(`/api/students`).then(results => {
                this.students = results.data
            }, error => {
                console.error(error);
            });
        },

    },

}
</script>

<style lang="scss">
.list-students {

}
</style>
