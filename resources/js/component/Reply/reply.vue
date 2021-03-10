<template>
       <div class="mt-2">
          <v-card>
              <v-card-title>
                  <div class="headline">{{reply.user}}</div>
              </v-card-title>
              <v-card-subtitle>
                  said {{reply.created_at}}
              </v-card-subtitle>
              <v-spacer></v-spacer>
              <like :reply="reply"></like>
              <v-divider></v-divider>
              <edit v-if="editing" :reply="this.reply" :slug="slug" :index="index"></edit>
                  <v-card-text v-else>
                      <div class="text--primary" style="color: black" v-html="body"></div>
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions v-if="!editing">

                      <v-btn
                          class="mx-2"
                          fab
                          small
                          color="black"
                          @click="edit"
                      >
                          <v-icon dark>
                              {{icons.edit}}
                          </v-icon>
                      </v-btn>
                      <v-btn
                          class="mx-2"
                          fab
                          small
                          color="black"
                          @click="destroy"
                      >
                          <v-icon dark>
                              {{icons.delete}}
                          </v-icon>
                      </v-btn>

                  </v-card-actions>
          </v-card>
       </div>
</template>

<script>
import { mdiPencil } from '@mdi/js'
import { mdiDelete } from '@mdi/js'
import Edit from "./edit";
import Like from "../like/like";
export default {
    name: "reply",
    components: {Like, Edit},
    props:['reply','index','slug'],
    data(){
        return{
            icons:{
                edit:mdiPencil,
                delete:mdiDelete,

            },
            editing:false,
        }
    },
    methods:{
        edit(){
            this.editing = true
        },
        destroy(){
            EventBus.$emit('deleteReply',this.index)
            console.log(this.reply.id)
            axios.delete(`/api/question/${this.slug}/reply/${this.reply.id}`).then(res =>console.log(res))
        },
        listen(){
            EventBus.$on('cancelEditing',()=>{
                this.editing=false
            })
            EventBus.$on('replyUpdate',(send)=>{
                if(this.reply.id == send.id){
                    this.reply.reply = send.body
                }
            })
        }
    },
    computed:{
        body(){
            return md.parse(this.reply.reply)
        },
    },
    created() {
        this.listen()
    }
}
</script>

<style scoped>

</style>
