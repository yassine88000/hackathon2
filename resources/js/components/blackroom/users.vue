<template>
    <div
        style="padding-left:50px;padding-right:50px;">
        <v-dialog
            v-model="dialog"
            width="500"
        >
            <v-card>
                <v-card-title class="headline grey lighten-2">
                    Voulez-vous vraiment supprimer cet utilisateur ?
                </v-card-title>

                <v-card-text>
                    {{ userIdSelected }}
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        color="primary"
                        text
                        @click="deleteDialog(), dialog= false"
                    >
                        Ne pas supprimer
                    </v-btn>

                    <v-btn
                        color="primary"
                        text
                        @click="confirmDelete(), dialog= false"
                    >
                        Supprimer
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog
            v-model="dialog2"
            width="500"
        >

            <v-card>
                <v-card-title class="headline grey lighten-2">
                    Modifiez l'utilisateur
                </v-card-title>

                <v-card-text>
                    <v-form @submit.prevent="editUser()" v-model="valid" ref="userForm">
                        <v-card-text>

                            <v-text-field
                                prepend-icon="face"
                                name="name"
                                label="Nom"
                                color="#e91f62"
                                v-model="userIdSelected.name"
                                :rules="nameRules"
                                background-color="white"
                                required></v-text-field>

                            <v-select
                                v-model="spot_id"
                                :items="$store.state.spots"
                                item-text="name"
                                item-value="id"
                                id="spot_id"
                                prepend-icon="account_balance"
                                name="spot_id"
                                type="text"
                                color="#e91f62"
                                label="Plateau"
                                :rules="spotRules"
                                required
                            >
                            </v-select>
                            <v-text-field id="email"
                                          prepend-icon="email"
                                          name="email"
                                          label="Email"
                                          type="email"
                                          color="#e91f62"
                                          v-model="userIdSelected.email"
                                          :rules="emailRules"
                                          required></v-text-field>

                            <v-text-field id="password"
                                          prepend-icon="vpn_key"
                                          name="password"
                                          label="Mot de passe"
                                          type="password"
                                          color="#e91f62"
                                          v-model="password"
                                          :rules="passwordRules"
                                          :append-icon="showPass ? 'visibility' : 'visibility_off'"
                                          :type="showPass ? 'text' : 'password'"
                                          @click:append="showPass = !showPass"
                                          class="input-group--focused"
                                          required></v-text-field>


                            <v-row>
                                <v-col style="width:200px;">
                                    <v-switch
                                        v-model="userIdSelected.is_admin"
                                        label="Administrateur"
                                        color="#C90F54"
                                        hide-details
                                    ></v-switch>
                                </v-col>
                                <v-col>
                                    <v-switch
                                        v-model="userIdSelected.is_judge"
                                        label="Juge"
                                        color="#C90F54"
                                        hide-details
                                    ></v-switch>
                                </v-col>
                            </v-row>

                        </v-card-text>
                    </v-form>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        color="primary"
                        text
                        @click="DialogEdit(), dialog2= false"
                    >
                        Annuler
                    </v-btn>

                    <v-btn
                        color="primary"
                        text
                        @click="editUser(), dialog2= false"
                    >
                        Modifier bg
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <h1 style="margin-bottom:20px;">Gestion des utilisateurs</h1>
        <v-card width="100%">
            <v-card-title>
                <v-icon x-large
                        color="black">
                    add_circle_outline
                </v-icon>
                &nbsp;Ajouter un utilisateur
            </v-card-title>
            <v-form @submit.prevent="addUser()" v-model="valid" ref="userForm">
                <v-card-text>

                    <v-text-field
                        prepend-icon="face"
                        name="name"
                        label="Nom"
                        color="#e91f62"
                        v-model="userIdSelected.name"
                        :rules="nameRules"
                        background-color="white"
                        required></v-text-field>

                    <v-select
                        v-model="spot_id"
                        :items="$store.state.spots"
                        item-text="name"
                        item-value="id"
                        id="spot_id"
                        prepend-icon="account_balance"
                        name="spot_id"
                        type="text"
                        color="#e91f62"
                        label="Plateau"
                        :rules="spotRules"
                        required
                    >
                    </v-select>
                    <v-text-field id="email"
                                  prepend-icon="email"
                                  name="email"
                                  label="Email"
                                  type="email"
                                  color="#e91f62"
                                  v-model="email"
                                  :rules="emailRules"
                                  required></v-text-field>

                    <v-text-field id="password"
                                  prepend-icon="vpn_key"
                                  name="password"
                                  label="Mot de passe"
                                  type="password"
                                  color="#e91f62"
                                  v-model="password"
                                  :rules="passwordRules"
                                  :append-icon="showPass ? 'visibility' : 'visibility_off'"
                                  :type="showPass ? 'text' : 'password'"
                                  @click:append="showPass = !showPass"
                                  class="input-group--focused"
                                  required></v-text-field>


                    <v-row>
                        <v-col style="width:200px;">
                            <v-switch
                                v-model="is_admin"
                                label="Administrateur"
                                color="#C90F54"
                                hide-details
                            ></v-switch>
                        </v-col>
                        <v-col>
                            <v-switch
                                v-model="is_judge"
                                label="Juge"
                                color="#C90F54"
                                hide-details
                            ></v-switch>
                        </v-col>
                    </v-row>

                </v-card-text>
                <v-card-actions style="padding:20px;">
                    <v-spacer></v-spacer>
                    <v-btn color="#e91f62" type="submit" x-large :disabled="!valid" class="white--text"> Enregistrer
                        l'utilisateur
                    </v-btn>

                </v-card-actions>
            </v-form>
        </v-card>

        <v-card width="100%" style="margin-top:30px;">
            <v-card-title>
                <v-icon x-large
                        color="black">
                    account_box
                </v-icon>
                &nbsp;Liste des utilisateurs
            </v-card-title>
            <v-list>
                <v-list-item-group
                >

                    <template v-for="(user, index) in $store.state.users">
                        <v-list-item two-line
                                     :key="user.id + '-user'"
                        >
                            <v-list-item-icon>
                                <v-icon>portrait</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title><strong> {{ user.name }} </strong>
                                    <v-chip
                                        class="ma-2" v-show="user.is_admin"
                                    >
                                        administrateur
                                        <v-icon right>
                                            security
                                        </v-icon>
                                    </v-chip>
                                    <v-chip
                                        class="ma-2" v-show="user.is_judge"
                                    >
                                        juge
                                        <v-icon right>
                                            gavel
                                        </v-icon>
                                    </v-chip>
                                    <v-chip
                                        class="ma-2"
                                        color="pink"
                                        label
                                        text-color="white"
                                    >
                                        <v-icon left>
                                            account_balance
                                        </v-icon>
                                        {{ getSpot(user.spot_id) }}
                                    </v-chip>
                                </v-list-item-title>
                                <v-list-item-subtitle v-text="user.email"></v-list-item-subtitle>
                            </v-list-item-content>
                            <v-list-item-action>
                                <div>
                                    <v-btn icon
                                           @click="DialogEdit(user.id)">
                                        <v-icon color="grey lighten-1">create</v-icon>
                                    </v-btn>

                                    <v-btn icon>
                                        <v-icon color="grey lighten-1" @click="deleteDialog(user.id)">delete
                                        </v-icon>
                                    </v-btn>
                                </div>
                            </v-list-item-action>

                        </v-list-item>
                        <v-divider
                            v-if="index < $store.state.users.length - 1"
                            :key="index"
                        ></v-divider>
                    </template>
                </v-list-item-group>
            </v-list>
        </v-card>
    </div>


</template>

<script>
export default {
    name: "users.vue",
    data: function () {
        return {
            showPass: false,
            valid: false,
            name: "",
            email: "",
            password: "",
            is_judge: true,
            is_admin: false,
            spot_id: "",
            dialog: false,
            dialog2: false,
            userIdSelected: '',
            nameRules: [
                v => !!v || 'Le nom est obligatoire',
            ],
            emailRules: [
                v => !!v || 'L\'adresse mail est obligatoire',
            ],
            spotRules: [
                v => !!v || 'Ce champ est obligatoire',
            ],
            passwordRules: [
                v => !!v || 'Ce champ est obligatoire',
            ],
        }
    },
    methods: {
        addUser: function () {
            this.$store.dispatch('addUser', {
                name: this.name,
                email: this.email,
                password: this.password,
                is_judge: this.is_judge,
                is_admin: this.is_admin,
                spot_id: this.spot_id
            });
            this.$refs.userForm.reset();
        },
        getSpot: function (spotId) {
            return this.$store.state.spots.find(spot => spot.id === spotId).name;
        },
        deleteDialog: function (id) {
            this.dialog = true
            this.userIdSelected = id
        },
        confirmDelete: function () {
            //(confirm('Voulez-vous vraiment supprimer cet utilisateur ?'))
            //     axios.delete(userIdSelected) .then(

            this.$store.dispatch('deleteUser', this.userIdSelected);
        },

        DialogEdit: function (id) {
            this.dialog2 = true
            this.userIdSelected = this.$store.state.users.find(user => user.id === id);
        },
        editUser: function () {
            this.$store.dispatch('editUser', {
                name: this.userIdSelected.name,
                email: this.email,
                is_judge: this.is_judge,
                is_admin: this.is_admin,
                spot_id: this.spot_id});

        },
    }
}


</script>

<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus textarea:-webkit-autofill,
textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
    -webkit-box-shadow: 0 0 0px 30px #ffffff inset !important;
}
</style>
