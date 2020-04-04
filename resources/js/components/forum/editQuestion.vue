<template>
<v-container >
<v-form @submit.prevent="updated">
    <v-text-field
      v-model="form.title"
      label="Title"
      type="text"
      required
    ></v-text-field>

  <vue-simplemde v-model="form.body" />
  <v-card-actions>
    <v-btn

        color="green"
        type="submit"
        >Save
    </v-btn>
    <v-btn @click="cancel"
        color="black"
        type="submit"
        >Cancel
    </v-btn>
  </v-card-actions>



</v-form>
</v-container>
</template>
<script>
export default {
    props:['data'],
    data() {
        return {
            form:{
                title:null,
                body:null,
            }
        }
    },
    methods:{
        cancel(){
                EventBus.$emit('cancelEditing')
        },
        updated() {
            axios.patch(`/api/question/${this.data.slug}`,this.form)
            .then(res => this.cancel())
            .catch(error =>{ })
        },
    },
    created(){
        this.form = this.data
    }

}
</script>
