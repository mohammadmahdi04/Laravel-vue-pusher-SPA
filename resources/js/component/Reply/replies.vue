<template>
        <v-container>
            <reply v-for="(reply,index) in content" :key="reply.id" :index="index" :slug="slug" :reply="reply"></reply>
        </v-container>
</template>

<script>
import Reply from "./reply";
export default {
    name: "replies",
    components: {Reply},
    props:['replies','slug'],
    data(){
      return{
          content:this.replies
      }
    },
    created() {
        this.listen();
    },
    methods:{
        listen(){
            EventBus.$on('newReply',(reply)=>{
                this.content.unshift(reply)
                EventBus.$emit('count');
            });
            EventBus.$on('deleteReply',(index)=>{
                this.content.splice(index,1)
                EventBus.$emit('countDec')
            })
        }
    }
}
</script>

<style scoped>

</style>
