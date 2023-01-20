import BassRequest from "./base-request";

class BookingService {
  // get data
  getAllBookingHome() {
    return BassRequest.get("/bookings/get-all-booking-homes", "admin");
  }

  getAllBookingClinic() {
    return BassRequest.get("/bookings/get-all-booking-clinics", "admin");
  }

  getBookingHomeById(id: any) {
    return BassRequest.get("/bookings/edit-booking-home/" + id, "admin");
  }

  // CRUD
  updateStatusBookingHome(status: any, id: any) {
    return BassRequest.put(
      "/bookings/update-status-booking-home/" + id,
      status,
      "admin"
    );
  }

  deleteBookingHome(id: any) {
    return BassRequest.delete("/bookings/destroy-booking-home/" + id, "admin");
  }
}

export default new BookingService();
