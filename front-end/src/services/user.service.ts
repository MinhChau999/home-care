import BassRequest from "./base-request";

class UserService {
  fogotPassword(user: any) {
    return BassRequest.post("/users/reset-password", user, "admin");
  }
  resetPassword(user: any, token: any) {
    return BassRequest.post("/users/reset-password/" + token, user, "admin");
  }
  getAllUser() {
    return BassRequest.get("/users/get-all-user", "admin");
  }
  deleteUser(id: any) {
    return BassRequest.delete("/users/destroy/" + id, "admin");
  }
}

export default new UserService();
