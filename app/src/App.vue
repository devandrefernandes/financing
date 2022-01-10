<template>
  <v-app>
    <v-app-bar
      app
      color="#eb7633"
      dark
    >
      <div>
        <v-img
          alt="Logo"
          class="shrink mr-2"
          contain
          src="./assets/logo.jpg"
          width="60"
        />
      </div>
    </v-app-bar>
    <v-main>
      <v-container class="d-flex justify-center">
        <Financing />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Financing from './views/financing/Financing';

export default {
  name: 'App',

  components: {
    Financing,
  },

  data: () => ({
    //
  }),
};
</script>
