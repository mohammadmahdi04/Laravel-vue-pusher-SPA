<template>
    <div v-if="question">
        <edit-question v-if="editing" :data="question"></edit-question>
        <div v-else>
            <show-question
                :data="question"
            ></show-question>
            <replies :replies="question.replies" :slug="question.slug"></replies>
            <create :question-slug="question.slug"></create>
        </div>
    </div>
</template>

<script>
import ShowQuestion from "./ShowQuestion";
import EditQuestion from "./EditQuestion";
import Replies from "../Reply/replies";
import Create from "../Reply/create";
export default {
name: "Read",
    components: {Create, Replies, EditQuestion, ShowQuestion},
    data(){
        return{
            question:null,
            editing:false
        }
    },
    created() {
         this.listen()
        this.getQuestion()
    },
    methods:{
        listen(){
            EventBus.$on('startEditing', () =>{
               this.editing = true
            });
            EventBus.$on('cancelEditing', () =>{
                this.editing = false
            });
        },
        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`).then(res => {
                this.question = res.data.data
                console.log(res.data.data)
            })
        }
    }
}
</script>

<style scoped>

</style>
