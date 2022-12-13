const apiUrl = "http://localhost:8000/api";

import axios from "axios";

class BassRequest {
  authHeader(role = "") {
    const user = JSON.parse(localStorage.getItem("token" + role) || "[]");
    if (user && user.token) {
      return { Authorization: "Bearer " + user.token };
    }
    return {};
  }

  get(url: string, role: any = "") {
    return axios.get(apiUrl + url, { headers: this.authHeader(role) });
  }

  post(url: string, data: any, role: any = "") {
    return axios.post(apiUrl + url, data, { headers: this.authHeader(role) });
  }
  delete(url: string, role: any = "") {
    return axios.delete(apiUrl + url, { headers: this.authHeader(role) });
  }
}

export default new BassRequest();
