// import the styling for the toast
import { createToast } from "mosha-vue-toastify";
import "mosha-vue-toastify/dist/style.css";

export default {
  success(message) {
    createToast({ title: 'Success!!!', description: message}, {
      type: "success",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
      toastBackgroundColor: "#10c469",
    });
  },

  error(message) {
    createToast({ title: 'Error!!!', description: message}, {
      type: "danger",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
      toastBackgroundColor: "#ff5b5b",
    });
  },

  info(message){
   createToast({ title: 'Info!!!', description: message}, {
      type: "info",
      timeout: 3000,
      showIcon: true,
      transition: "zoom", 
      toastBackgroundColor: "#35b8e0",
    });
  },

  warning(message){
   createToast({ title: 'Warning!!!', description: message}, {
      type: "warning",
      timeout: 3000,
      showIcon: true,
      transition: "zoom",
    });
  }
};
