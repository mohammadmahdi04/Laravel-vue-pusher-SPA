<template>
    <v-container>
        <v-card>
            <v-container>
                <vue-simplemde v-model="form.body" />
            </v-container>
         <v-card-actions class="mb-2">
             <v-btn
                 class="mx-2"
                 small
                 dark
                 color="#43A047"
                 @click="update"
             >
                 Update
             </v-btn>
             <v-btn
                 class="mx-2"
                 small
                 dark
                 color="black"
                 @click="cancel"
             >
                 Cancel
             </v-btn>
         </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
import VueSimplemde from "vue-simplemde";
export default {
    name: "edit",
    props:['reply','slug','index'],
    components:{VueSimplemde},
    data(){
        return {
            form:{
                body:this.reply.reply
            }
        }
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.slug}/reply/${this.reply.id}`,{body:this.form.body}).then(res =>{
                EventBus.$emit('replyUpdate',{id:this.reply.id,body:this.form.body})
                this.cancel()
            })
        }
    }
}
</script>

<style scoped>

</style>
