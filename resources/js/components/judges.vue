<template>
    <v-app>
        <v-main>
<router-view></router-view></v-main>
            <v-bottom-navigation>
                <v-btn value="recent">
                    <span>super</span>

                    <v-icon>history</v-icon>
                </v-btn>

                <v-btn value="favorites">
                    <span>genial</span>

                    <v-icon>cached</v-icon>
                </v-btn>

                <v-btn value="nearby">
                    <span>velo</span>

                    <v-icon>class</v-icon>
                </v-btn>
            </v-bottom-navigation>
    </v-app>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
