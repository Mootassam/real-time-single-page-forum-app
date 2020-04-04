<template>
    <div>
      <vue-simplemde v-model="reply.reply" />

 <v-card-actions>
        <v-btn icon small @click="updated"><v-icon color="green">save</v-icon></v-btn>  <v-btn icon small @click="cancel"><v-icon color="black">cancel</v-icon></v-btn>
    </v-card-actions>
    </div>
</template>
<script>
export default {
    props:['reply'],
    data() {
        return {
        }
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
         },
        updated() {
  axios.patch(`/api/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
  .then(res => this.cancel(this.reply.reply))
        },
    }
}
</script>
