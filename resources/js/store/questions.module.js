import ApiService from '../common/api.service';
import JwtService from '../common/jwt.service';

export default {
    state: {
        questions: [],
        pagination: {
            current_page: null,
            last_page: null,
            per_page: null,
            total: null
        }
    },
    mutations: {
        setQuestions(state, payload) {
            state.questions = payload.data;
            state.pagination.current_page = payload.current_page;
            state.pagination.last_page = payload.last_page;
            state.pagination.per_page = payload.per_page;
            state.pagination.total = payload.total;

        }
    },
    actions: {
        fetchQuestions({ commit }, payload) {
            console.log('payload', payload)
            return new Promise((resolve, reject) => {
                ApiService.query('questions', payload).then(({ data }) => {
                    console.log(data)
                    commit('setQuestions', data)
                }).catch((error) => {

                })
            })
        }
    }
}