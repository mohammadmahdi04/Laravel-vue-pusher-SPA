<template>

    <v-container>
        <v-form @submit.prevent="update">
            <v-text-field
                label="Title"
                type="text"
                v-model="form.title"
            ></v-text-field>
            <vue-simplemde v-model="form.body" />
           <v-card-actions>
               <v-btn color="green" type="submit">Save</v-btn>
               <v-btn color="lightBlue" @click="cancel">Cancel</v-btn>
           </v-card-actions>
        </v-form>
    </v-container>

</template>

<script>
import VueSimplemde from "vue-simplemde";
export default {
    components:{VueSimplemde},
    name: "EditQuestion",
    props:['data'],
    data(){
        return {
            form:{
                title:null,
                body:null
            }
        }
    },
    created() {
        this.form = this.data
    },
    methods:{
        cancel(){
          EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.form.slug}`,this.form)
            .then(res => this.cancel())
        }
    }
}
</script>

<style scoped>

</style>
