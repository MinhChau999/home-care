import BassRequest from "./base-request";

class UserService {
  fogotPassword(user: any) {
    return BassRequest.post("/users/reset-password", user, "admin");
  }
  resetPassword(user: any, token: any) {
    return BassRequest.post("/users/reset-password/" + token, user, "admin");
  }
  changePassword(userPassword: any) {
    return BassRequest.put("/users/change-password", userPassword, "admin");
  }

  // get data
  getAllUser() {
    return BassRequest.get("/users/get-all-user", "admin");
  }

  getUserByToken() {
    return BassRequest.get("/users/edit-profile", "admin");
  }

  getUserByID(id: any) {
    return BassRequest.get("/users/edit/" + id, "admin");
  }

  //CRUD method
  createUser(user: any) {
    return BassRequest.post("/users/store", user, "admin");
  }
  updateUserByToken(user: any) {
    return BassRequest.post("/users/update-profile", user, "admin");
  }
  updateUserByID(user: any, id: any) {
    return BassRequest.post("/users/update/" + id, user, "admin");
  }
  deleteUser(id: any) {
    return BassRequest.delete("/users/destroy/" + id, "admin");
  }
}

export default new UserService();
