<template>
<v-container>
    <v-form @submit.prevent="submit">
        <v-text-field
        label="Category Name"
        v-model="form.name"
        required >

        </v-text-field>
        <v-btn type="submit" color="teal">Create </v-btn>
    </v-form>

      <v-card class="mx-auto" >
    <v-toolbar color="blue" dark>
      <v-toolbar-title>Categories</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>
    <v-list two-line>
      <v-list-item-group active-class="blue--text">
        <template  v-for="item in categories" >
          <v-list-item :key="item.id" >
            <template >
              <v-list-item-content>
                <v-list-item-title  v-text="item.name" > </v-list-item-title>
              </v-list-item-content>


                 <v-btn icon>
         <v-icon color="orange">edit</v-icon>
      </v-btn>  <v-btn icon>
        <v-icon color="red" @click="destroy(item.slug)">delete</v-icon>
      </v-btn>




            </template>
          </v-list-item>
 <v-divider></v-divider>
        </template>
      </v-list-item-group>
    </v-list>
  </v-card>


</v-container>
</template>
<script>
export default {
    data() {
        return {
            form:{
                name:null,

            },
             categories:{}
        }
    },
    created(){
        if(!User.admin()){ this.$router.push('/forum')}

    axios.get('/api/category')
    .then(res => this.categories = res.data.data)
    .catch(error => console.log(error.response.data.error))
},
    methods:{
        submit(){
            axios.post('/api/category',this.form).then(res => {this.categories.unshift(res.data)
            this.form.name= null }).catch()
        },
        destroy(slug,index){
            axios.delete(`/api/category/${slug}`)
            .then(res => this.categories.splice(index,1))
            .catch(error => console.log(error.response.data.error))
        }
    }

}
</script>
