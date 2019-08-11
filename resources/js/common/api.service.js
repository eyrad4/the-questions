import axios from 'axios';
import JwtService from './jwt.service';
import { API_URL } from './config';

const ApiService = {
    init() {
        axios.defaults.baseURL = API_URL;
    },

    setHeader() {
        axios.defaults.headers.common[
            "Authorization"
            ] = `Bearer ${JwtService.getToken()}`;
    },

    query(resource, params) {
        return axios.get(`${resource}`, params).catch((error) => {
            throw new Error(`ApiService ${error}`)
        });
    },

    post(resource, params) {
        return axios.post(`${resource}`, params);
    }

};

export default ApiService;
