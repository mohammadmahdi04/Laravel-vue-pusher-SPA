<template>
    <v-container>
    <v-card>
        <v-container>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{data.title}}
                    </div>
                    <span class="grey--text"><b>User:</b>{{data.user}} <br> <b>Request:</b>{{data.created_at}}</span>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="teal">{{data.replies_count}} Replies</v-btn>
            </v-card-title>
            <v-card-text v-html="body">

            </v-card-text>
                <v-card-actions>
                    <v-btn
                        class="mx-2"
                        fab
                        dark
                        small
                        color="primary"
                        @click="edit"
                    >
                        <v-icon dark>
                           {{icons.edit}}
                        </v-icon>
                    </v-btn>
                    <v-btn
                        class="mx-2"
                        fab
                        dark
                        small
                        color="primary"
                        @click="destroy"
                    >
                        <v-icon dark>
                            {{icons.delete}}
                        </v-icon>
                    </v-btn>

                </v-card-actions>
        </v-container>
    </v-card>
    </v-container>
</template>

<script>
import { mdiPencil } from '@mdi/js'
import { mdiDelete } from '@mdi/js'
export default {
    name: "ShowQuestion",
    props:['data','replies'],
    data(){
        return{
            icons:{
                edit:mdiPencil,
                delete:mdiDelete
            }
        }
    },
    created() {
        this.listen()
    },
    computed:{
       body(){
           return md.parse(this.data.body)
       },
    },
    methods:{
        destroy(){
            axios.delete(`/api/question/${this.data.slug}`).then(res => this.$router.push('/forum'))
        },
        edit(){
            EventBus.$emit('startEditing');
        },
        listen(){
            EventBus.$on('count',()=>{
                this.data.replies_count +=1;
            })
            EventBus.$on('countDec',()=>{
                this.data.replies_count -=1;
            })
        }
    }
}
</script>

<style scoped>

</style>
