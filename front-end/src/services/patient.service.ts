import BassRequest from "./base-request";

class PatientService {
  // get data
  getAllPatient() {
    return BassRequest.get("/patients/get-all-patient", "admin");
  }
}

export default new PatientService();
