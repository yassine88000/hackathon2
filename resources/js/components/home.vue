<template>
        <v-main :style="{backgroundColor : background}" class="transit">
            <v-container fill-height fluid>
                <v-row align="center" justify="center">
                    <v-col align="center" justify="center" cols="12">
                    <img src="/img/logo-qa-white.svg" width="300"style="margin-bottom:40px;"><br>
                        <a href="/spots/" class="btn" @mouseover="background = '#cae00f'" @mouseout="background = 'black'">
                            <svg width="420" height="62">
                                <rect x="5" y="5" rx="25" fill="none" stroke="white" width="410" height="50"></rect>
                            </svg>
                            <span>scoring temps réel</span>
                        </a><br>
                        <a href="/judges/" class="btn" @mouseover="background = '#ff007f'" @mouseout="background = 'black'">
                            <svg width="420" height="62">
                                <rect x="5" y="5" rx="25" fill="none" stroke="white" width="410" height="50"></rect>
                            </svg>
                            <span>application pour les juges</span>
                        </a><br>
                        <a href="/blackroom/" class="btn" @mouseover="background = '#9C51B7'" @mouseout="background = 'black'">
                            <svg width="420" height="62">
                                <rect x="5" y="5" rx="25" fill="none" stroke="white" width="410" height="50"></rect>
                            </svg>
                            <span>administration générale</span>
                        </a>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
</template>

<script>
    export default {
        data: function() {
            return {
                background: 'black'
            }
        },
        methods: {
        }
    }
</script>

<style>
    .transit {
        transition: background-color 1s ease;
    }
    .btn {
        margin-top:10px;
        position: relative;
        display: inline-block;


        width: 420px;
        height: 50px;
        font-size: 1em;
        font-weight: bold;
        line-height: 60px;
        text-align: center;
        text-transform: uppercase;
        background-color: transparent;
        cursor: pointer;
        text-decoration:none;
        font-family: 'Roboto', sans-serif;
        font-weight:900;
        font-size:22px;
        letter-spacing: 0.045em;
        outline: 0;
        margin-top:20px;
    }

    .btn svg {
        position: absolute;
        top: 0;
        left: 0;
    }

    .btn svg rect {
    //stroke: #EC0033;
        stroke-width: 4;
        stroke-dasharray: 353, 0;
        stroke-dashoffset: 0;
        -webkit-transition: all 600ms ease;
        transition: all 600ms ease;
    }

    .btn span{
        color: white;
    }

    .btn:hover svg rect {
        stroke-width: 4;
        stroke-dasharray: 353, 500;
        stroke-dashoffset: 250;
    }
</style>
