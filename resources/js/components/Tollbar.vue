<template>
 <v-toolbar>
     <v-toolbar-title>Bitfumes</v-toolbar-title>
<v-spacer></v-spacer>

<app-notification v-if="loggedIn"></app-notification>
<v-toolbar-items class="hidden-sm-and-down">
<router-link v-for="item in items" :key="item.title" :to="item.to"
 >  <v-btn text large v-if="item.show"  >{{item.title}}</v-btn> </router-link>
</v-toolbar-items>
 </v-toolbar>
</template>
<script>
import appNotification from './AppNotification'
export default {
        components: {appNotification},
data() {

    return {
        loggedIn:User.loggedIn(),
        items:[
                {title :'Forum', to:'/forum', show:true},
                {title :'Ask Question', to:'/ask', show:User.loggedIn()},
                {title :'Category', to:'/category', show:User.admin()},
                {title :'Login', to:'/login', show:!User.loggedIn()},
                {title :'Logout', to:'/logout', show:User.loggedIn()},
              ]
    }
},
created(){
    EventBus.$on('logout',() => {
        User.logout()

    })
}
}
</script>
