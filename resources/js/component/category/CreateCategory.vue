<template>
    <v-container>
        <v-form @submit.prevent="create">
            <v-text-field
                label="Category Name"
                type="text"
                v-model="form.name"
            ></v-text-field>
            <v-btn type="submit"
                   class="mx-2"
                   color="#8E24AA"
                   dark
                   v-if="editSlug">
                Update
            </v-btn>
            <v-btn type="submit"
                   class="mx-2"
                   color="#42A5F5"
                   dark
                   v-else>
                Create
            </v-btn>
        </v-form>
        <v-card   class="mt-2">
        <v-toolbar
            color="indigo"
            dark
            dense
            width="100%"
        >
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
       <div v-for="(category,index) in categories" :key="category.id">
           <v-list >
               <v-list-item>
                   <v-btn
                       class="mx-2"
                       fab
                       dark
                       small
                       color="primary"
                       @click="edit(index)"
                   >
                       <v-icon dark>
                           {{icons.edit}}
                       </v-icon>
                   </v-btn>

                   <v-list-item-content>
                       <v-list-item-title >{{category.name}}</v-list-item-title>
                       <!--                    <v-list-item-subtitle >cat</v-list-item-subtitle>-->
                   </v-list-item-content>
                   <v-list-item-action>
                       <v-btn
                           class="mx-2"
                           fab
                           dark
                           small
                           color="primary"
                           @click="destroy(category.slug,index)"
                       >
                           <v-icon dark>
                               {{icons.delete}}
                           </v-icon>
                       </v-btn>
                   </v-list-item-action>
               </v-list-item>
           </v-list>
               <v-divider></v-divider>
       </div>
        </v-card>
    </v-container>
</template>

<script>
import { mdiPencil } from '@mdi/js'
import { mdiDelete } from '@mdi/js'
export default {
name: "Create",
    data(){
        return {
            icons:{
                edit:mdiPencil,
                delete:mdiDelete
            },
            form:{
                name:null
            },
            categories:null,
            editSlug:null
        }
    },
        methods:{
        create(){
            if (this.editSlug){
                axios.patch(`/api/category/${this.editSlug}`,this.form)
                    .then(res => {
                    // console.log(res)
                    //     console.log(res.data)
                    this.categories.unshift(res.data)
                    this.form.name = null
                })
                this.editSlug = null
            }else{
                axios.post('/api/category',this.form).then(res => {
                    // console.log(res)
                    this.categories.unshift(res.data.data)
                    this.form.name = null
                })
            }
        },
        destroy(slug,index){
            // console.log(index)
            // this.categories.splice(index,1)
            // console.log(this.categories)
            axios.delete(`/api/category/${slug}`).then(res => this.categories.splice(index,1))
        },
            edit(index){
                // console.log(this.categories[index].name)
                    this.form.name = this.categories[index].name
                    this.editSlug = this.categories[index].slug
                     this.categories.splice(index,1)
            }
    },
    created() {
        axios.get('/api/category').then(res =>this.categories = res.data.data)
    }
}
</script>

<style scoped>
</style>
