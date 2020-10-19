<template>
    <v-main style="backgroundColor : black" class="transit">
        <a href="/">
            <v-btn
                class="mx-2"
                fab
                large
                color="white"
                absolute
                left
                top
                style="left:15px;top:25px;z-index:2000"
            >
                <v-icon color="black">
                    keyboard_backspace
                </v-icon>
            </v-btn>
        </a>
        <v-container fill-height fluid style="padding:0px;">
            <v-row align="center" justify="center">

                <v-col align="center" justify="center" cols="6" style="padding:0px;">
                    <v-row align="center" justify="center" style="height:100vh;position:relative;margin-right:0px;margin-left:0px">
                        <div class="backgroundAnimator fader" style="z-index:1000; background-image:url('/img/quai-alpha.jpg')" v-show="selectedBackground =='qa'"></div>
                        <div class="backgroundAnimator fader" style="z-index:1010; background-image:url('/img/pole-tourisme.jpg')" v-show="selectedBackground =='pt'"></div>
                        <div class="backgroundAnimator fader" style="z-index:1020; background-image:url('/img/pole-image.jpg')" v-show="selectedBackground =='pi'"></div>
                        <div class="backgroundAnimator fader" style="z-index:1030; background-image:url('/img/grande-finale.jpg')" v-show="selectedBackground =='gf'"></div>
                        <div  class="backgroundAnimator aligner" style="z-index:1040"> <img src="/img/logo-qa-white.svg" width="600"></div>


                    </v-row>
                </v-col>

                <v-col align="center" justify="center" cols="6" style="padding:0px;">
                    <v-row class="specialHeight transit" align="center" justify="center"
                           :style="{backgroundColor : backgroundQA}"
                           @mouseover="backgroundQA = '#C90F54', selectedBackground='qa'"
                           @mouseout="backgroundQA = '#212121',selectedBackground='none'" @click="goScoring()">scoring
                        quai alpha
                    </v-row>
                    <v-row class="specialHeight transit" align="center" justify="center"
                           :style="{backgroundColor : backgroundTourisme}"
                           @mouseover="backgroundTourisme = '#cae00f', selectedBackground='pt'"
                           @mouseout="backgroundTourisme = '#424242',selectedBackground='none'">scoring pôle e-tourisme
                    </v-row>
                    <v-row class="specialHeight transit" align="center" justify="center"
                           :style="{backgroundColor : backgroundImage}"
                           @mouseover="backgroundImage = '#21164E', selectedBackground='pi'"
                           @mouseout="backgroundImage = '#616161',selectedBackground='none'">scoring pôle image
                    </v-row>
                    <v-row class="specialHeight transit" align="center" justify="center"
                           :style="{backgroundColor : backgroundFinale}"
                           @mouseover="backgroundFinale = '#FFD500', selectedBackground='gf'"
                           @mouseout="backgroundFinale = '#757575',selectedBackground='none'">scoring grande finale
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
    export default {
        name: 'spots.vue',
        data: function () {
            return {
                backgroundQA: '#212121',
                backgroundTourisme: '#424242',
                backgroundImage: '#616161',
                backgroundFinale: '#757575',
                selectedBackground: 'none',
                currentID: 0,
            }
        },
        methods: {
            goScoring() {
                this.$root.$router.push({name: 'scoring'})
            }
        }
    }
</script>

<style>
    .aligner {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .transit {
        transition: background-color 0.5s ease;
    }
    .backgroundAnimator {
        position:absolute;
        top:0px;
        right:12px;
        height:100%;
        width:100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;

    }


    .fader {
        display: inherit !important;
        transition: opacity 1s;
    }

    .fader[style*="display: none;"] {
        opacity: 0;
        pointer-events: none;
        user-select: none;
    }


    .specialHeight {
        height: 25vh;
        font-size: 40px;
        color: white;
        font-family: 'Roboto', sans-serif;
        font-weight: 900;
        text-transform: uppercase;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.3s
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }

</style>
