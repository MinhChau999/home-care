import BassRequest from "./base-request";

class ClinicService {
  // get data
  getAllClinic() {
    return BassRequest.get("/clinics/get-all-clinic", "admin");
  }
}

export default new ClinicService();
