<template>
    <div class="list-students">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">

                <h1>
                    Élèves
                    <a href="/new-student" class="btn btn-primary btn-title btn-md active" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Nouvel élève
                    </a>
                </h1>

                <!-- NO STUDENTS ALERT -->
                <div v-if="!students.length" class="alert alert-warning" role="alert">
                    Aucun produit pour le moment !
                </div>

                <template v-else>
                    <!-- STUDENT RESEARCH -->
                    <div class="form-group row justify-content-center research">
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="text" class="form-control" v-model="research" id="research">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <span class="oi oi-magnifying-glass"></span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- STUDENTS LIST -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Date d'entrée</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in filteredStudents">
                                <th scope="row">{{ student.id }}</th>
                                <td>{{ student.firstname }}</td>
                                <td>{{ student.lastname }}</td>
                                <td>{{ student.email }}</td>
                                <td>{{ student.phone }}</td>
                                <td>{{ student.created_at }}</td>
                                <td>
                                    <a :href="'/student/'+student.id+'/list-bills'" class="btn btn-success btn-sm active" role="button" aria-pressed="true">
                                        <span class="oi oi-list"></span>
                                        Factures
                                    </a>
                                    <a :href="'/student/'+student.id+'/new-bill'" class="btn btn-warning btn-sm active" role="button" aria-pressed="true">
                                        <span class="oi oi-plus"></span>
                                        Facture
                                    </a>
                                </td>
                            </tr>
                      </tbody>
                    </table>
                </template>
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
            students: [],
            research: '',
        }
    },

    created() {
        this.fetchStudents()
    },

    computed: {

        filteredStudents() {
            let research = this.research.toLowerCase()

            return _.filter(this.students, function(s) {
                return s.fullname.toLowerCase().includes(research)
                    || (s.lastname ? s.lastname : '').concat(" "+s.firstname).toLowerCase().includes(research)
                    || (s.email ? s.email : '').includes(research)
                    || (s.phone ? s.phone : '').includes(research)
            })
        },

    },

    methods: {

        fetchStudents() {
            axios.get(`/api/students`).then(results => {
                this.students = results.data
            }, error => {
                console.error(error)
            })
        },

    },

}
</script>

<style lang="scss">
.list-students {
    h1 {
        margin: 0px 0 10px 0;
    }

    .btn-title {
        float: right;
    }

    .research {
        margin-bottom: 30px;
    }
}
</style>
