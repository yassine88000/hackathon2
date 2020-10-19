<template>
    <div>
        <v-snackbar
            v-model="$store.state.snack.status"
            timeout="3000"
            :color="$store.state.snack.color"
        >
           <strong> {{ $store.state.snack.text}} </strong>

        </v-snackbar>

        <v-navigation-drawer
            color="#C90F54"
            permanent
            dark
            fixed
            app
        >

            <v-list style="padding-top:20px;"
                    dense
            >
                <div><img src="/img/logo-qa-white.svg" width="250" style="margin-bottom:30px;">
                </div>

                <v-subheader><strong>SCORE</strong></v-subheader>
                <v-list-item-group
                    active-class=" text--accent-4"
                >
                    <v-divider></v-divider>
                    <v-list-item @click="goToRoute('scoring')">
                        <v-list-item-icon>
                            <v-icon>military_tech</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title><strong>GESTION SCORING</strong></v-list-item-title>
                    </v-list-item>
                </v-list-item-group>

                <v-subheader><strong>GESTION</strong></v-subheader>
                <v-list-item-group
                    active-class=" text--accent-4"
                >
                    <v-divider></v-divider>
                    <v-list-item @click="goToRoute('users')">
                        <v-list-item-icon>
                            <v-icon>account_box</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title><strong>UTILISATEURS</strong></v-list-item-title>
                    </v-list-item>

                    <v-list-item @click="goToRoute('spots')">
                        <v-list-item-icon name="sdf">
                            <v-icon>account_balance</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title><strong>PLATEAUX</strong></v-list-item-title>
                    </v-list-item>
                    <v-list-item h @click="goToRoute('projects')">
                        <v-list-item-icon name="sdf">
                            <v-icon>construction</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title><strong>PROJETS</strong></v-list-item-title>
                    </v-list-item>

                </v-list-item-group>

            </v-list>
        </v-navigation-drawer>

        <v-app-bar
            color="black"
            dark
            app

        >
            <v-toolbar-title><strong>QUAI ALPHA</strong> <span class="font-weight-light">hackathon 2020</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn color="white">
                <v-icon color="#C90F54">lock</v-icon>
                <span style="color:#C90F54">&nbsp;LOGOUT</span>
            </v-btn>
        </v-app-bar>

        <v-main>
        <v-container fluid>
        <transition name="fade" mode="out-in" appear>
        <router-view></router-view>
        </transition>
        </v-container>
        </v-main>
    </div>

</template>

<script>
    export default {
        name: "admin",
        data: function () {
            return {
                drawer: false
            }
        },
        methods: {
            goToRoute: function (routeName) {
                this.$root.$router.push({name: routeName});
            }
        }
    }
</script>

<style>

</style>
