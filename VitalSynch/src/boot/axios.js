import { boot } from "quasar/wrappers";
import { LocalStorage } from "quasar";
import axios from "axios";

let axiosConfig = {
  // baseURL: "https://vitalsynch-924e9f1085c2.herokuapp.com/api",
  baseURL: "http://127.0.0.1:8000/api",
  withCredentials: false,
  headers: {
    "Content-Type": "application/json",
    Authorization: `Bearer ${LocalStorage.getItem("Bearer") || ""}`,
  },
  xsrfCookieName: "access_token",
  data: {},
};

axios.interceptors.response.use(
  function (response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    return response;
  },
  function (error) {
    // Any status codes that fall outside the range of 2xx cause this function to trigger
    // Do something with response error
    // console.log(error.Error);
    // const { status } = error.response;
    return Promise.reject(error);
  }
);

let ChainCallback = (promises, callback) => {
  promises
    .then((response) => {
      typeof callback.success === "function" && callback.success(response);
    })
    .catch((response) => {
      if (response !== 200) {
        alert(response);
      }
      typeof callback.catch === "function" && callback.catch(response);
    });
};

const api = axios.create(axiosConfig);

export default boot(({ app }) => {
  app.config.globalProperties.$axios = axios;
  app.config.globalProperties.$api = api;
});

const httpGet = (resource, callback, payload = {}) => {
  let newConfig = Object.assign({}, axiosConfig);
  newConfig.params = payload;
  const storedToken = localStorage.getItem("access_token");
  newConfig.headers.Authorization = `Bearer ${storedToken}`; // Remove Authorization header
  ChainCallback(axios.get(resource, newConfig), callback);
};

const httpPost = (resource, payload, callback) => {
  (axiosConfig.headers.Authorization = `Bearer ${
    LocalStorage.getItem("access_token") || ""
  }`), // Remove Authorization header
    ChainCallback(axios.post(resource, payload, axiosConfig), callback);
};

const httpAuthPost = (resource, payload, callback) => {
  axiosConfig.headers.Authorization = ""; // Remove Authorization header
  ChainCallback(axios.post(resource, payload, axiosConfig), callback);
};
const httpPut = (resource, payload, callback) => {
  (axiosConfig.headers.Authorization = `Bearer ${
    LocalStorage.getItem("access_token") || ""
  }`), // Remove Authorization header
  ChainCallback(axios.put(resource, payload, axiosConfig), callback);
};

const httpDel = (resource, payload, callback) => {
  let newConfig = Object.assign({}, axiosConfig);
  newConfig.data = payload;
  (axiosConfig.headers.Authorization = `Bearer ${
    LocalStorage.getItem("access_token") || ""
  }`), // Remove Authorization header
  ChainCallback(axios.delete(resource, newConfig), callback);
};

const httpFileUpload = (resource, payload, callback) => {
  let fileConfig = {
    withCredentials: true,
    baseURL: axiosConfig.baseURL,
    xsrfCookieName: "access_token",
    headers: {
      "Content-Type": "multipart/form-data",
      // Authorization header removed for now
    },
  };

  ChainCallback(axios.post(resource, payload, fileConfig), callback);
};

const httpFileDownload = (resource, payload, callback) => {
  let fileConfig = {
    withCredentials: true,
    baseURL: axiosConfig.baseURL,
    xsrfCookieName: "access_token",
    headers: {
      // Authorization header removed for now
    },
    responseType: "arraybuffer",
  };

  let newConfig = Object.assign({}, fileConfig);
  newConfig.params = payload;

  ChainCallback(axios.get(resource, newConfig), callback);
};

export {
  api,
  httpGet,
  httpAuthPost,
  httpPost,
  httpPut,
  httpDel,
  httpFileUpload,
  httpFileDownload,
};
