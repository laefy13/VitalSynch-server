import { boot } from "quasar/wrappers";
import axios, { AxiosHeaders } from "axios";

const api = axios.create({
  baseURL: "https://vitalsynch-924e9f1085c2.herokuapp.com/api/",
});

api.interceptors.request.use(
  (config) => {
    // just uncomment this if the login page is done
    // const token = localStorage.getItem("authToken");
    // and comment this if the above is uncommented
    const token = "3|jCFIg16imaqlc43gbQ2fbqGubddb4rfWLVADSTOR2625550c";
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default boot(({ app }) => {
  app.config.globalProperties.$axios = AxiosHeaders;

  app.config.globalProperties.$api = api;
});

export { axios, api };
