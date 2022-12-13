import BassRequest from "./base-request";

class UserService {
  getPublicContent() {
    return BassRequest.get("/all");
  }

  getUserBoard() {
    return BassRequest.get("/user");
  }
}

export default new UserService();
