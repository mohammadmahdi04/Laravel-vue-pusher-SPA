<template>
    <v-container>
        <h1>New Reply</h1>
        <v-card>
            <v-container>
            <vue-simplemde v-model="form.body" />
            </v-container>
            <v-btn
                class="mx-2"
                fab
                small
                color="green"
                @click="save"
            >
                <v-icon dark>
                    {{icons.save}}
                </v-icon>
            </v-btn>
        </v-card>
    </v-container>
</template>

<script>
import { mdiContentSave } from '@mdi/js'
import VueSimplemde from "vue-simplemde";
export default {
    props:['questionSlug'],
    name: "create",
    components:{VueSimplemde},
    data(){
        return {
            icons:{
              save:mdiContentSave
            },
            form:{
                body:null,
                user_id:2
            }
        }
    },
    methods:{
        save(){
            axios.post(`/api/question/${this.questionSlug}/reply`,this.form).then(res => {
                EventBus.$emit('newReply',res.data.reply)
                this.form.body = null
            })
        }
    }
}
</script>

<style scoped>

</style>
