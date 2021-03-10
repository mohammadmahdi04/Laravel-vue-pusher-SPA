<template>
    <v-card
        class="m-75 mx-auto"
        width="100%"
    >
            <router-link :to="question.path"><v-card-title>{{question.title}} </v-card-title></router-link>
        <v-card-subtitle>
           <b>User:</b> {{question.user}} <br>
            <b>Request:</b> {{question.created_at}}
        </v-card-subtitle>
        <v-expand-transition>
            <div >
                <v-divider></v-divider>
                <v-card-text v-html="body">

                </v-card-text>
            </div>
        </v-expand-transition>
    </v-card>
</template>

<script>
export default {
name: "Question",
    props: ['question'],
    computed:{
        body(){
            return md.parse(this.question.body)
        },
    },
}
</script>

<style scoped>

</style>
