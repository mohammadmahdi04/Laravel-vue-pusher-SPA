<template>
    <div class="text-center">
        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    dark
                    v-bind="attrs"
                    v-on="on"
                    class="mx-2"
                    fab
                    small
                    @click=""
                >
                    <v-icon :color="color">
                        {{icons.alert}}
                    </v-icon> {{unReadCount}}
                </v-btn>
            </template>
            <v-list>
                <v-list-item
                    v-for="item in unread"
                    :key="item.id"
                >
                   <router-link :to="item.data.path">
                       <v-list-item-title @click="markAsRead(item)">{{item.data.question}}</v-list-item-title>
                   </router-link>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
import { mdiBellPlusOutline } from '@mdi/js'
export default {
name: "AppNotification",
    data(){
        return{
            icons:{
                alert:mdiBellPlusOutline
            },
            read:{},
            unread:{},
            unReadCount:0
        }
    },
    created() {
        this.getNotifications()
    },
    methods:{
        getNotifications() {
            axios.post('/api/notifications').then(res =>{
                this.read = res.data.read
                this.unread = res.data.unread
                this.unReadCount = res.data.unread.length
                console.log(res)
            })

        },
        markAsRead(notification){
            axios.post('/api/markAsRead',{id:notification.id}).then(res =>console.log(res))
        }
    },
    computed:{
        color(){
            return this.unReadCount>0 ? '#EF5350' : '#616161'
        }
    }
}
</script>

<style scoped>

</style>
