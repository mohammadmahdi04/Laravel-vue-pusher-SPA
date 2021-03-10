<template>
    <div>
        <v-btn
            class="mx-2"
            fab
            small
            @click="likeIt"
            color="#FAFAFA"
        >
            <v-icon :color="color">
                {{icons.heart}}
            </v-icon>
            {{count}}
        </v-btn>
    </div>
</template>

<script>
import { mdiHeart } from '@mdi/js'
export default {
name: "like",
    props:['reply'],
    data(){
        return{
            icons:{
                heart:mdiHeart
            },
            count:this.reply.like_count,
            liked:false
        }
    },
    computed:{
            color(){
                return this.liked ? '#B71C1C' : '#FFCDD2'
            }
    },
    methods:{
        likeIt(){
            this.liked ? this.decr() : this.incr()
            this.liked = !this.liked
        },
        incr(){
            axios.post(`/api/like/${this.reply.id}`).then(res => this.count++)

        },
        decr(){
            axios.delete(`/api/like/${this.reply.id}`).then(res => this.count--)
        }
    },
    created() {
        Echo.channel('likeChannel').listen('LikeEvent',(e)=>{
            console.log(e)
        });
    }
}
</script>

<style scoped>

</style>
