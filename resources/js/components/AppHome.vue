<template>
<div>
    <tollbar></tollbar>
    <router-view></router-view>
  <appfooter></appfooter>
</div>
</template>

<script>
import tollbar from './Tollbar'
import Appfooter from './Appfooter'
import Login from './login/Login'
    export default {
        components:{tollbar,Appfooter,Login}
    }
</script>
