// import the styling for the toast
import { createToast } from "mosha-vue-toastify";
import "mosha-vue-toastify/dist/style.css";

export default {
  success(message) {
    createToast(message, {
      type: "success",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
      toastBackgroundColor: "#38761D",
    });
  },

  error(message) {
    createToast(message, {
      type: "danger",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
      toastBackgroundColor: "#cc0000",
    });
  },

  info(message){
   createToast(message, {
      type: "info",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
    });
  },

  warning(message){
   createToast(message, {
      type: "warning",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
    });
  }
};
