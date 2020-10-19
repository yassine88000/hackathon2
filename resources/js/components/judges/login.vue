<template>
<div>
    <v-card class="mx-auto my-12"
            max-width="374">
        <v-card-title class="headline pink" primary-title>
            <span style="color:white;">Login</span>
        </v-card-title>
        <v-card-text>
            <v-form ref="userLogin">
                <v-text-field
                    prepend-icon="email"
                    label="Email"
                    required
                    v-model="userData.email"
                ></v-text-field>
                <v-text-field
                    prepend-icon="vpn_key"
                    name="UserPassword"
                    label="Mot de passe"
                    hint="8 caractères minimum"
                    v-model="userData.password"
                    class="input-group--focused"
                ></v-text-field>


                <v-btn
                    color="primary"
                @click="login">
                    Login
                </v-btn>
            </v-form>
        </v-card-text>
        <v-divider></v-divider>

    </v-card>
</div>
</template>

<script>
    export default {
        name: "login.vue",
        data: function() {
            return {
                userData: {
                    email: null,
                    password: null
                }
            };
        },
        methods: {
            login: function() {
                this.$store.dispatch('loginUser', this.userData);
            }
        }
    }
</script>

<style scoped>

</style>
