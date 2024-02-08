import { httpGet, httpPost, httpPut } from "src/boot/axios";
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

export { FetchItem, FetchItems };
