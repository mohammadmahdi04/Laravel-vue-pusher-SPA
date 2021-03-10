<template>
    <v-container>
        <v-form @submit.prevent="create">
            <v-text-field
                label="Title"
                type="text"
                v-model="form.title"
            ></v-text-field>
            <v-autocomplete
                v-model="form.category_id"
                :items="categories"
                item-text="name"
                item-value="id"
                dense
                filled
                label="Category"
            ></v-autocomplete>
            <vue-simplemde v-model="form.body" />
            <v-btn color="green" type="submit">Create</v-btn>
        </v-form>
    </v-container>
</template>

<script>
import VueSimplemde from "vue-simplemde";
export default {
    components:{VueSimplemde},
name: "Create",
    data(){
        return{
            form:{
                title:null,
                body:null,
                category_id:null,
                user_id: 1
            },
            categories:{},
        }
    },
    created(){
      axios.get('/api/category').then(res => this.categories = res.data.data)
    },
    methods:{
            create(){
                axios.post('/api/question',this.form).then(res =>this.$router.push(res.data.data.path))
            }
    }
}
</script>

<style scoped>
@import '~simplemde/dist/simplemde.min.css';
</style>
