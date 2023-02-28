const apiUrl = "http://35.241.110.16:8000/api";

import axios from "axios";

class BassRequest {
  authHeader(role = "") {
    let headers = {};
    try {
      const user = JSON.parse(localStorage.getItem("token" + role) || "[]");
      if (user && user.token) {
        headers = { Authorization: "Bearer " + user.token };
      }
    } catch (e) {
      console.error("Error parsing JSON: ", e);
    }
    return headers;
  }

  get(url: string, role: any = "") {
    return axios.get(apiUrl + url, { headers: this.authHeader(role) });
  }

  post(url: string, data: any, role: any = "") {
    return axios.post(apiUrl + url, data, { headers: this.authHeader(role) });
  }

  put(url: string, data: any, role: any = "") {
    return axios.put(apiUrl + url, data, { headers: this.authHeader(role) });
  }

  delete(url: string, role: any = "") {
    return axios.delete(apiUrl + url, { headers: this.authHeader(role) });
  }
}

export default new BassRequest();
