<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>spots</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Roboto+Condensed:100,300,400,500,700,900">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="{{ asset('js/spots.js') }}" defer></script>
    </head>
    <body>
    <v-app id="app" style="background-color:black;">
        <transition name="fade" mode="out-in" appear>
        <router-view></router-view>
        </transition>
    </v-app>
    </body>
</html>
