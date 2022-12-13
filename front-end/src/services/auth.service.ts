import BassRequest from "./base-request";

class AuthService {
  loginUser(user: any) {
    return BassRequest.post("/login", {
      email: user.email,
      password: user.password,
    }).then((response) => {
      if (response.data.data.token) {
        localStorage.setItem("token", JSON.stringify(response.data.data));
      }
      return response;
    });
  }

  loginAdmin(user: any) {
    return BassRequest.post("/admin/login", {
      email: user.email,
      password: user.password,
    }).then((response) => {
      if (response.data.data.token) {
        localStorage.setItem("tokenadmin", JSON.stringify(response.data.data));
      }
      return response;
    });
  }

  logoutUser() {
    localStorage.removeItem("token");
  }

  logoutAdmin() {
    localStorage.removeItem("tokenadmin");
  }

  registerUser(user: any) {
    return BassRequest.post("/register", {
      name: user.name,
      email: user.email,
      password: user.password,
    }).then((response) => {
      if (response.data.data.token) {
        localStorage.setItem("token", JSON.stringify(response.data.data));
      }
      return response;
    });
  }
}

export default new AuthService();
