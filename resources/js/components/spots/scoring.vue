<template>
    <v-main style="backgroundColor:black;">
        <v-row align="center" justify="center">
            <v-col cols="2">
                <v-btn
                    class="mx-2"
                    fab
                    large
                    color="white"
                    absolute
                    left
                    top
                    style="left:15px;top:25px"
                    @click="goHome"
                >
                    <v-icon color="black">
                        keyboard_backspace
                    </v-icon>
                </v-btn>
            </v-col>
            <v-col align="center" justify="center" cols="6">
                <div>
                <transition-group name="flip-list" tag="ul">
                    <li v-for="project in projectsWatcher" v-bind:key="project.id" style="text-align:left">
                        <div class="round">{{ project.note }}</div> <div class="white-text">{{ project.name }}</div>
                    </li>
                </transition-group>
                </div>
            </v-col>
            <v-col align="center" justify="center" cols="4">
                <div v-for="project in projects" style="margin-top:30px;">
                <v-slider
                    v-model="project.note"
                    thumb-label="always"
                    thumb-color="#C90F54"
                    track-color="white"
                    color="#C90F54"
                ></v-slider>
                </div>
            </v-col>

        </v-row>
    </v-main>
</template>

<script>
    export default {
        name: 'spots.vue',
        data: function () {
            return {
                projects: [
                    {id: '0', name: 'Projet A d gdfg dfg d', note: 90},
                    {id: '1', name: 'Projet B dgfdg df gd ', note: 80},
                    {id: '2', name: 'Projet Cdf gdgdfg', note: 75},
                    {id: '4', name: 'Projet Ddfg dgdfg', note: 72},
                    {id: '5', name: 'Projet Edg dfg dfg', note: 62},
                    {id: '6', name: 'Projet Fd gdfgdfg ', note: 58},
                    {id: '7', name: 'Projet Gdfg dfgdfgdf', note: 55},
                    {id: '8', name: 'Projet Hdf gdfgdfgdf', note: 53},
                ],
            }
        },
        methods: {
            goHome () {
                this.$root.$router.push({ name: 'Home' })
            }
        },
        computed: {
            projectsWatcher: function () {
                return _.orderBy(this.projects, 'note', ['desc'])
            }
        }
    }
</script>

<style>
    .flip-list-move {
        transition: transform 1s;
    }

    .white-text {
        display:inline;
        color: white;
        font-size:80px;
        margin:20px;
        text-align:left
    }
    .round{
        display:inline;
        margin-top:-15px;
        padding: 20px;
        background-color: #C90F54;
        border-radius: 50%;
        font-size:50px;
        font-weight:bolder;
        color:white
    }
</style>

