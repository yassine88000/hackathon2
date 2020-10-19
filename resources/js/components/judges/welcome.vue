<template>
    <div style="padding:50px">
    <h1>welcome {{$store.state.userData.name}}</h1>
    <v-btn @click="consoleUser">Console log user data</v-btn>
        <v-btn @click="logOut">log out</v-btn>
    </div>
</template>

<script>
    export default {
        name: "welcome.vue",
        methods: {
            consoleUser: function() {
                this.$store.dispatch('consoleUser');
            },
            logOut: function() {
                this.$store.dispatch('logout');
            }
        }
    }
</script>

<style>

</style>
