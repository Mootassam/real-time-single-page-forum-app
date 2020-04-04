<template>
<div class="mt-3">
<v-card>
    <v-card-title>
        <div class="headline">{{data.user}}</div>

        <div class="ml-2">Said {{data.created_at}}</div>
        <v-spacer></v-spacer>
        <like :content= data ></like>
    </v-card-title>
    <v-divider></v-divider>
    <edit-reply v-if="editing" :reply=data></edit-reply>
    <v-card-text v-else v-html="data.reply"></v-card-text>
    <v-divider></v-divider>
    <div v-if="!editing" >
    <v-card-actions v-if="own">
        <v-btn icon small @click="edit"><v-icon color="orange">edit</v-icon></v-btn>  <v-btn icon small @click="destroy"><v-icon color="red">delete</v-icon></v-btn>
    </v-card-actions>
    </div>
</v-card>
</div>
</template>
<script>
import editReply from './editReply'
import like from '../likes/like'
export default {
    components:{editReply,like},
props:['data','index'],
data() {
    return {
        editing:false,
        beforEditReplyBody:'',
    }
},
computed:{
    own(){ return  User.own(this.data.user_id) }
},
created(){
    this.listen()
},
methods:{
    destroy(){
        EventBus.$emit('deleteReply',this.index)
    },
    edit(){
        this.editing= true


    },
    listen(){
        EventBus.$on('cancelEditing',(reply)=> {
            this.editing =false

        })
    }
}
}
</script>
