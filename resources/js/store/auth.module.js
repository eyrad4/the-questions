import ApiService from '../common/api.service';
import JwtService from '../common/jwt.service';

export default {
    state: {
        user: {},
        isAuthenticated: !!JwtService.getToken()
    },
    mutations: {
        set_auth(state, payload) {
            state.isAuthenticated = true;
            state.user = {};
            JwtService.saveToken(payload)
        },
        logout(state) {
            state.isAuthenticated = false;
            state.user = {};
            JwtService.destroyToken()
        }
    },
    actions: {
        login({ commit }, payload) {
            return new Promise((resolve, reject) => {
                ApiService.post('/auth/login', payload).then(({ data: { access_token } }) => {
                    commit('set_auth', access_token)
                    resolve();
                }).catch((error) => {
                    reject(error);
                })
            })
        },
        register({ commit }, payload) {
            return new Promise((resolve, reject) => {
                ApiService.post('/auth/register', payload).then(() => {
                    resolve();
                }).catch((error) => {
                    reject(error);
                })
            })
        },
        logout({ commit }) {
            ApiService.setHeader();
            ApiService.post('/auth/logout').then(() => {
                commit('logout');
            })
        }
    }
}
