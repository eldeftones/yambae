<template>
    <div class="new-student">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Nouvel(le) élève</h1>

                <!-- MESSAGES -->
                <div v-if="message">
                    <div class="alert alert-success" role="alert">
                        <strong>Yeah !</strong> {{ message }}
                    </div>
                    <a href="/new-student" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                        <span class="oi oi-plus"></span>
                        Nouvel(le) élève
                    </a>
                    <a href="/list-students" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Liste des élèves</a>
                </div>

                <!-- NEW STUDENT FORM -->
                <div v-else class="card card-default">
                    <div class="card-header">Nouvel(le) élève</div>

                    <div class="card-body">

                        <!-- GENDER -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Sexe</label>
                            <div class="col-md-2">
                                <select class="form-control input-md" v-model="student.gender">
                                    <option value="male">Homme</option>
                                    <option value="female">Femme</option>
                                </select>
                            </div>
                        </div>

                        <!-- FIRSTNAME -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="firstname">Prénom</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" v-model="student.firstname" id="firstname" />
                            </div>
                        </div>

                        <!-- LASTNAME -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label" for="lastname">Nom</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" v-model="student.lastname" id="lastname" />
                            </div>
                        </div>

                        <!-- ENTRY DATE -->
                        <div class="form-group row">
                            <label class="col-md-2 control-label">Date d'entrée</label>
                            <div class="col-md-10">
                                 <date-picker
                                    v-model="student.created_at"
                                    lang="fr"
                                    type="date"
                                />
                            </div>
                        </div>

                        <!-- SAVE BUTTON -->
                        <div class="form-group row">
                            <div class="col-md-10">
                                <button type="button" class="btn btn-success" @click="addStudent">Créer</button>
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
            student: {
                gender: 'male',
                firstname: '',
                lastname: '',
                created_at: new Date(),
            },
        }
    },

    computed: {

    },

    methods: {

        addStudent() {
            this.student.created_at = moment(this.student.created_at).format('YYYY-MM-DD')

            axios.post(`/api/student/new`, this.student).then(results => {
                this.message = results.data.message
            }, error => {
                this.errors = results.data.message
            })
        },

    },

}
</script>

<style lang="scss">
.new-student {
    h1 {
        margin: 30px 0 50px 0;
    }
}
</style>
