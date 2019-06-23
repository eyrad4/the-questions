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
            state.user = '';
            JwtService.saveToken(payload)
        }
    },
    actions: {
        login({ commit }, payload) {
            return new Promise((resolve, reject) => {
                ApiService.post('/auth/login', payload).then(({ data: { access_token } }) => {
                    commit('set_auth', access_token)
                }).catch((error) => {

                })
            })
        }
    }
}