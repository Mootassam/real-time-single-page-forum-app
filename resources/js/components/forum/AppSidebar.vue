<template>
  <v-card
    max-width="500"
    class="mx-auto"
  >
    <v-toolbar
      color="blue"
      dark
    >

      <v-toolbar-title>Categories</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>

    <v-list two-line>
      <v-list-item-group


        active-class="blue--text"
      >
        <template v-for="item in categories">
          <v-list-item :key="item.id">
            <template >
              <v-list-item-content>
                <v-list-item-title v-text="item.name"></v-list-item-title>
              </v-list-item-content>
            </template>
          </v-list-item>
        </template>
      </v-list-item-group>
    </v-list>
  </v-card>
</template>
<script>
export default {
    data() {
        return {
            item :{},
            index :{},
             categories:{},
        }
    },


created(){
    axios.get('/api/category')
    .then(res => this.categories = res.data.data)
    .catch(error => console.log(error.response.data.error))
}
}
</script>
