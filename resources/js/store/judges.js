import Vue from 'vue'
import Vuex from 'vuex'
import router from '../router/judges'


Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        errors: [],
        userData: null,
        authToken: null

    },
    mutations: {
        setErrors(state, errors) {
            state.errors = errors;
        },
        setUserData(state, payload) {
            state.userData = payload;
        },
        setToken(state, payload) {
            state.authToken = payload;
        },
        killToken(state, payload) {
            state.authToken = null;
        },
        logOut(state) {
            state.userData = null;
            state.authToken = null;
        }
    },
    actions: {
        loginUser({commit}, payload) {
            axios.post(window.location.origin + "/api/login", payload)
                .then(response => {
                   commit("setUserData", response.data.user);
                    commit("setToken", response.data.token);
                    router.push({name:"welcome"});
                }).catch(error => {
            });
        },
        consoleUser({ commit }) {
            axios.get(window.location.origin + "/api/user")
                .then(response => {
                   console.log(response.data);
                }).catch(error => {
            });
        },
        logout({ commit }) {
            axios.post(window.location.origin + "/api/logout").then(() => {
                router.push({name:"Login"});
                commit("logOut");
            });
        },
    }
})

