import BassRequest from "./base-request";

class UserService {
  getAllUser() {
    return BassRequest.get("/users/get-all-user", "admin");
  }
  deleteUser(id: any) {
    return BassRequest.delete("/users/destroy/" + id, "admin");
  }
}

export default new UserService();
