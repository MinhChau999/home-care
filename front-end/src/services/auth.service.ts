import BassRequest from "./base-request";

class AuthService {
  loginUser(user: any) {
    return BassRequest.post("/login", {
      email: user.email,
      password: user.password,
    }).then((response) => {
      if (response.data.data.token) {
        try {
          localStorage.setItem("token", JSON.stringify(response.data.data));
          // Do something with the parsed data
        } catch (e) {
          console.error("Error parsing JSON: ", e);
        }
      }
      return response;
    });
  }

  loginAdmin(user: any) {
    return BassRequest.post("/users/login", {
      email: user.email,
      password: user.password,
    }).then((response) => {
      if (response.data.data.token) {
        try {
          localStorage.setItem(
            "tokenadmin",
            JSON.stringify(response.data.data)
          );
          // Do something with the parsed data
        } catch (e) {
          console.error("Error parsing JSON: ", e);
        }
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
        try {
          localStorage.setItem("token", JSON.stringify(response.data.data));
          // Do something with the parsed data
        } catch (e) {
          console.error("Error parsing JSON: ", e);
        }
      }
      return response;
    });
  }
}

export default new AuthService();
