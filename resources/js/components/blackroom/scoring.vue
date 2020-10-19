<template>
    <div
        style="padding-left:50px;padding-right:50px;">
        <h1 style="margin-bottom:20px;">Notations</h1>
        <v-card width="100%">
            <v-card-title>
                <v-icon x-large
                        color="black">
                    add_circle_outline
                </v-icon>
                Ouvertures Des Notations
            </v-card-title>
            <v-card-content>
                <v-container class="lighten-5">
                    <v-row no-gutters
                           v-for="(project, index) in $store.state.projects"
                           :key="project.id + '-project'" >

                        <v-col>
                          {{ project.name }}
                        </v-col>

                        <v-col>
                            Nombre De Vote
                        </v-col>

                        <v-col>
                            <v-col>
                                Statut Des Projets
                            </v-col>

                            <div class="my-2">
                                <v-btn
                                    color="yellow"
                                    fab
                                    x-large
                                    dark
                                >
                                    <v-icon>query_builder</v-icon>
                                </v-btn>
                            </div>

                            <div class="my-2">
                                <v-btn
                                    color="success"
                                    fab
                                    x-large
                                    dark
                                >
                                    <v-icon>lock_open</v-icon>
                                </v-btn>
                            </div>

                            <div class="my-2">
                                <v-btn
                                    color="red"
                                    fab
                                    x-large
                                    dark
                                >
                                    <v-icon>lock_close</v-icon>
                                </v-btn>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-content>
        </v-card>
    </div>
</template>


<script>

export default {
    name: "scoring",
}
</script>

<style>


</style>
