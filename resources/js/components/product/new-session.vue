<template>
    <div class="new-product">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Nouvelle session</h1>

                TODO
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
            categories: null,
        }
    },

    created() {
        this.fetchCategories()
    },

    computed: {

    },

    methods: {

        fetchCategories() {
            axios.get(`/api/categories`).then(results => {
                this.categories = results.data
            }, error => {
                console.error(error)
            })
        },

        createSession() {
            // this.product.created_at = moment(this.product.created_at).format('YYYY-MM-DD')
            //
            // axios.post(`/api/product/new`, this.product).then(results => {
            //     this.message = results.data.message
            // }, error => {
            //     this.errors = results.data.message
            // })
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
