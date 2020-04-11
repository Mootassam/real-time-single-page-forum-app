<template>
<div> <reply v-for="(reply,index) in content " :key="reply.id" :data="reply" :index=index></reply>
 </div>

</template>
<script>
import reply from './reply'
export default {
    props:['question'],
    data() {
        return {
            content:this.question.replies
        }
    },
    components:{reply},
    created(){
        this.listen()
    },
    methods:{
        listen(){
            EventBus.$on('newReply',(reply) => {
                    this.content.unshift(reply)
            })
            EventBus.$on('deleteReply',(index)=>{
                axios.delete(`/api/${this.question.slug}/reply/${this.content[index].id}`).then(res => {
                         this.content.splice(index,1)
                })

            })

             Echo.private('App.User.' + User.id())
                .notification((notification) => {
                    this.content.unshift(notification.reply)
                });
                Echo.channel('deleteReplyChannel')
                .listen('DeleteReplyEvent',(e) => {
                    for (let index = 0; index < this.content.length; index++) {
                            if(this.content[index].id == e.id){
                            this.content.splice(index,1);
                            }
                    }
                })

        }


    }


}
</script>
