<template>
    <div class="new-billing">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Nouvelle facture</div>

                    <div class="card-body">

                        <!-- NAME -->
                        <div class="form-group clearfix">
                            <label class="col-md-2 control-label">Nom</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" v-model="name" />
                            </div>
                        </div>


                        <toggle-button :value="false"
                           color="#82C7EB"
                           :sync="true"
                           :labels="true"/>

                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
// import axios from 'axios'
// import ToggleButton from 'vue-js-toggle-button/src/Button.vue'

export default {
    props: [
    ],

    // components: {
    //     ToggleButton,
    // },

    data() {
        return {
            name: 'test',
        }
    },

    computed: {

    },

    methods: {

    },

    mounted() {
        console.log('Component mounted.')
    },

}
</script>

<style lang="scss">
.new-billing {

}
</style>
