import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Login from '../components/login/Login'
import signup from '../components/login/signup'
import forum from '../components/forum/Forum'
import Read from '../components/forum/read'
import Create from '../components/forum/create'
import Category from '../components/category/createCategory'
import logout from  '../components/login/logout'



const routes = [

    { path: '/login', component: Login },
    { path: '/logout', component: logout },
    { path: '/Category', component: Category },
    { path: '/signup', component: signup },
    { path: '/forum', component: forum, name:'forum'},
    { path: '/ask', component: Create},
    { path: '/question/:slug', component: Read, name:'read'},


  ]

  // 3. Create the router instance and pass the `routes` option
  // You can pass in additional options here, but let's
  // keep it simple for now.
  const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang : false,
    mode : 'history', // ce si pour enlever # dan url
  })
  export default router

  // 4. Create and mount the root instance.
  // Make sure to inject the router with the router option to make the
  // whole app router-aware.
