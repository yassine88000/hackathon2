<template>
    <v-container fill-height fluid
                 style="background-color:black;background-image:url('/img/grande-finale.jpg');background-size: cover;">
        <v-row align="center"
               justify="center">
            <v-col>
                <v-card
                    class="mx-auto"
                    max-width="400"
                >
                    <v-card-text style="background-color:#C90F54;" class="text-center">
                        <img
                            src="/img/logo-qa-white.svg"

                            class="white--text align-end"
                            height="300" width="300"
                        >
                    </v-card-text>

                    <v-card-text>

                        <v-text-field prepend-icon="email" name="email" label="email" type="text"
                                      color="#C90F54"></v-text-field>

                        <v-text-field id="password" prepend-icon="lock" name="password" label="Password" type="password"
                                      color="#C90F54"></v-text-field>

                    </v-card-text>
                    <v-card-actions style="padding:20px;">
                        <v-spacer></v-spacer>
                        <v-btn color="#C90F54" type="submit" dark @click="goToGeneral"><strong> Let's do it !! </strong>
                        </v-btn>

                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>


</template>

<script>
    export default {
        name: "login",
        methods: {
            goToGeneral: function () {
                this.$router.push({name: 'general'})
            }
        }
    }
</script>

<style>

</style>
