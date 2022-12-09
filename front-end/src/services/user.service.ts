import axios from "axios";
import { Item } from "vue3-easy-data-table";
import authHeader from "./auth-header";

const API_URL = "http://localhost:8000/api/";

class UserService {
  getAdminBoard() {
    return axios.get(API_URL + "user", { headers: authHeader("admin") });
  }
  getAllUser() {
    return axios.get(API_URL + "get-all-user", {
      headers: authHeader("admin"),
    });
  }
  mockClientItems(): Item[] {
    const mockItems: Item[] = [];
    for (let i = 1; i < 100 + 1; i += 1) {
      mockItems.push({
        name: `name-${i}`,
        address: `address-${i}`,
        height: i,
        weight: i,
        age: i,
      });
    }
    return mockItems;
  }
}

export default new UserService();
