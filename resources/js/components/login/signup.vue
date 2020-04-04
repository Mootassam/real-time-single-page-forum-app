<template>
  <v-container>
        <v-form @submit.prevent="signup">
             <v-text-field
      v-model="form.name"
      label="Name"
      type="email"
      required
    ></v-text-field>
    <span v-if="errors.name" class="red--text">{{errors.name[0]}}</span>

    <v-text-field
      v-model="form.email"
      label="Email"
      type="email"
      required
    ></v-text-field>
    <span v-if="errors.email" class="red--text">{{errors.email[0]}}</span>


    <v-text-field
      v-model="form.password"
      type="password"
      label="Password"
      required
    ></v-text-field>
    <span v-if="errors.password" class="red--text">{{errors.password[0]}}</span>


        <router-link to="/login"><v-btn color="red" >Login</v-btn></router-link>

        <v-btn
            color="green"
            type="submit"
            >Sign up
        </v-btn>


  </v-form>
</v-container>

</template>

<script>
export default {
    data() {
        return {
            form:{
                name :null,
                email :null,
                password :null,

            },
            errors:['']
        }
    },
    methods:{
        signup(){
            axios.post('/api/auth/signup',this.form)
            .then(res => { User.responseAfterLogin(res)
            this.$router.push({name: 'forum'})
            })
            .catch(error => {
                if(error.response.status == 422 ){
                    this.errors = error.response.data.errors
                }
            })
               }
    }
}
</script>
