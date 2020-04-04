<template>
    <div>
        <v-btn icon :color="color" @click="likeIt"><v-icon>favorite</v-icon> {{count}}</v-btn>
    </div>
</template>
<script>
export default {
    props:['content'],
    data() {
            return {
                liked:this.content.liked,
                count:this.content.like_count,
            }
        },
        created(){
            Echo.channel('LikeChannel')
            .listen('LikeEvent', (e) => {
            console.log(e)
    });
        },
        computed:{
            color(){
                return this.liked ? 'red' : 'red lighten-4'
            }
        },
    methods:{

        likeIt(){
            if(User.loggedIn()){
                this.liked ? this.decr() : this.incr()
                this.liked = !this.liked
            }

        }, incr(){
            axios.post(`/api/Like/${this.content.id}`)
              .then(res => {  this.count ++ })
            },
            decr(){
                axios.delete(`/api/Like/${this.content.id}`)
              .then(res => {   this.count --})
            }

    }

}
</script>
