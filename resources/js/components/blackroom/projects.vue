<template>
    <div
        style="padding-left:50px;padding-right:50px;">
        <h1 style="margin-bottom:20px;">Gestion des projets</h1>
        <v-card width="100%">
            <v-card-title>
                <v-icon x-large
                        color="black">
                    add_circle_outline
                </v-icon>
                &nbsp;Ajouter un projet
            </v-card-title>
            <v-form @submit.prevent="addProject()" v-model="valid" ref="projectForm">
                <v-card-text>
                    <v-text-field
                        id="name"
                        prepend-icon="construction"
                        name="name"
                        label="Nom du projet"
                        color="#e91f62"
                        v-model="name"
                        :rules="nameRules"
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
                    ></v-select>


                </v-card-text>
                <v-card-actions style="padding:20px;">
                    <v-spacer></v-spacer>
                    <v-btn color="#e91f62" type="submit" x-large :disabled="!valid" class="white--text"> Enregistrer
                        le projet
                    </v-btn>

                </v-card-actions>
            </v-form>
        </v-card>
        <v-card width="100%" style="margin-top:30px;">
            <v-card-title>
                <v-icon x-large
                        color="black">
                    construction
                </v-icon>
                &nbsp;Liste des projets
            </v-card-title>
            <v-list>
                <v-list-item-group
                >
                    <template v-for="(project, index) in $store.state.projects">
                        <v-list-item
                                     :key="project.id + '-project'"
                        >
                            <v-list-item-icon>
                                <v-icon>build_circle</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title> <strong> {{ project.name }} </strong>
                                    <v-chip
                                        class="ma-2"
                                        color="pink"
                                        label
                                        text-color="white"
                                    ><v-icon left>
                                        account_balance
                                    </v-icon>
                                        {{getSpot(project.spot_id)}}
                                    </v-chip>
                                </v-list-item-title>
                            </v-list-item-content>
                            <v-list-item-action>
                                <div>
                                    <v-btn icon>
                                        <v-icon color="grey lighten-1">create</v-icon>
                                    </v-btn>
                                    <v-btn icon>
                                        <v-icon color="grey lighten-1">delete</v-icon>
                                    </v-btn>
                                </div>
                            </v-list-item-action>

                        </v-list-item>
                        <v-divider
                            v-if="index < $store.state.projects.length - 1"
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
        name: "projects.vue",
        data: function () {
            return {
                valid: false,
                spot_id: "",
                name: "",
                nameRules: [
                    v => !!v || 'Le nom est obligatoire',
                ],
                spotRules: [
                    v => !!v || 'Un plateau est obligatoire',
                ],
            }
        },
        methods: {
            addProject: function () {

                this.$store.dispatch('addProject', {name: this.name, spot_id: this.spot_id});
                this.$refs.projectForm.reset();
            },
            getSpot: function (spotId) {
                return this.$store.state.spots.find(spot => spot.id === spotId).name;
            }
        }
    }
</script>

<style>

</style>

