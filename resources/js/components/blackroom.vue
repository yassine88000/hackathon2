<template>
    <v-app style="background-color:#e4e4e4;">
        <transition name="fade" mode="out-in" appear>
<router-view></router-view>
            </transition>
    </v-app>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.3s
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }

</style>

