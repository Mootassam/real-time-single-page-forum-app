<template>
   <v-container>
        <v-form @submit.prevent="create">
    <v-text-field
      v-model="form.title"
      label="Title"
      type="text"
      required
    ></v-text-field>

 <v-select
        v-model="form.category_id"
        :items="categories"
        item-value="id"
        :menu-props="{ top: true, offsetY: true }"

        label="Category"
        item-text="name"
       autocomplete
      ></v-select>

  <vue-simplemde v-model="form.body" />
        <v-btn
            color="green"
            type="submit"
            >  <v-icon> create </v-icon>
        </v-btn>






  </v-form>
</v-container>
</template>
<script>
export default {
    data() {
        return {
            form:{
                title:null,
                category_id: 'null',
                body:null,
            },
            categories:{},
            errors:{},
        }
    },
    created(){
        axios.get('/api/category').then(res=> this.categories = res.data.data)
        .catch(error => {console.log(error.response.data)})
            },
    methods:{
        create(){
            axios.post('/api/question',this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => this.errors =error.response.data.message  )
                    }
    },
}
</script>
