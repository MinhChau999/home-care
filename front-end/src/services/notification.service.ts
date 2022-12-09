// import the styling for the toast
import { createToast } from "mosha-vue-toastify";
import "mosha-vue-toastify/dist/style.css";

class Notification {
  success(message: any) {
    createToast(
      { title: "Success!!!", description: message },
      {
        type: "success",
        timeout: 3000,
        showIcon: true,
        transition: "zoom",
        toastBackgroundColor: "#10c469",
      }
    );
  }

  error(message: any) {
    createToast(
      { title: "Error!!!", description: message },
      {
        type: "danger",
        timeout: 3000,
        showIcon: true,
        transition: "zoom",
        toastBackgroundColor: "#ff5b5b",
      }
    );
  }

  info(message: any) {
    createToast(
      { title: "Info!!!", description: message },
      {
        type: "info",
        timeout: 3000,
        showIcon: true,
        transition: "zoom",
        toastBackgroundColor: "#35b8e0",
      }
    );
  }

  warning(message: any) {
    createToast(
      { title: "Warning!!!", description: message },
      {
        type: "warning",
        timeout: 3000,
        showIcon: true,
        transition: "zoom",
      }
    );
  }
}
export default new Notification();
