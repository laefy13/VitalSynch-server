import { httpGet, httpPost, httpPut } from "src/boot/axios";
// const API_URL = "http://127.0.0.1:8000/api";
const API_URL = "https://vitalsynch-924e9f1085c2.herokuapp.com/api";

const FetchItem = (path, id) => {
  return new Promise((resolve, reject) => {
    httpGet(`${API_URL}/${path}/${id}`, {
      success(response) {
        resolve(response);
      },
      catch(response) {
        reject(response);
      },
    });
  });
};

const FetchItems = (path) => {
  return new Promise((resolve, reject) => {
    httpGet(`${API_URL}/${path}`, {
      success(response) {
        resolve(response);
      },
      catch(response) {
        reject(response);
      },
    });
  });
};

const UpdateItem = (path, data) => {
  return new Promise((resolve, reject) => {
    httpPut(`${API_URL}/${path}`, data, {
      success(response) {
        resolve(response);
      },
      catch(error) {
        reject(error);
      },
    });
  });
};
const UpdateProf = (path, data) => {
  return new Promise((resolve, reject) => {
    httpPut(`${API_URL}/${path}`, data, {
      success(response) {
        resolve(response);
      },
      catch(error) {
        reject(error);
      },
    });
  });
};
const AddItem = (path, data) => {
  return new Promise((resolve, reject) => {
    httpPost(`${API_URL}/${path}`, data, {
      success: (response) => {
        console.log(response.data);
      },
      catch: (error) => {
        console.error("Login Error:", error);
      },
    });
  });
};
export { FetchItem, FetchItems, UpdateItem, AddItem, UpdateProf };
