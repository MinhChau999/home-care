import axios from "axios";
const API_URL = "http://localhost:8000/api/";

class AuthService {
  loginUser(user) {
    return axios
      .post(API_URL + "login", {
        email: user.email,
        password: user.password,
      })
      .then((response) => {
        if (response.data.data.token) {
          localStorage.setItem("token", JSON.stringify(response.data.data));
        }
        return response.data;
      });
  }

  loginAdmin(user) {
    return axios
      .post(API_URL + "admin/login", {
        email: user.email,
        password: user.password,
      })
      .then((response) => {
        if (response.data.data.token) {
          localStorage.setItem("tokenadmin", JSON.stringify(response.data.data));
        }
        return response.data;
      });
  }

  logoutUser() {
    localStorage.removeItem("token");
  }

  logoutAdmin() {
    localStorage.removeItem("tokenadmin");
  }

  registerUser(user) {
    return axios
      .post(API_URL + "register", {
        name: user.name,
        email: user.email,
        password: user.password,
      })
      .then((response) => {
        if (response.data.data.token) {
          localStorage.setItem("token", JSON.stringify(response.data.data));
        }
        return response.data;
      });
  }
}

export default new AuthService();
