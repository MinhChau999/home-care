const apiUrl = "http://localhost:8000/api/";

import axios from "axios";

export default {
  getHeaders() {
    const token = window.localStorage.getItem("token");
    if (token == null) {
      return {};
    }
    return { Authorization: "Bearer " + token };
  },

  get(url: string) {
    return axios.get(apiUrl + url, { headers: this.getHeaders() });
  },

  post(url: string, data: any) {
    return axios.post(apiUrl + url, data, { headers: this.getHeaders() });
  },
};
