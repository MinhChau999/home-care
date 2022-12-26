<template>
  <div class="test">
    <button @click="showModal = true">Open Modal</button>
    <transition name="modal">
      <div
        id="standard-modal"
        :class="{ show: showModal }"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-labelledby="standard-modalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="standard-modalLabel">
                Modal Heading
              </h4>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-hidden="true"
              >
                ×
              </button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-primary">
                Save changes
              </button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </transition>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "MyModal",
  data() {
    return {
      showModal: false,
    };
  },
});
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(27, 37, 67, 0.2);
  z-index: 9999;
}

.modal1 {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -150%);
  background: white;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  z-index: 100000;
  max-width: 600px;
  width: 90%;
  border-radius: 4px;
  overflow: hidden;
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid #eee;
  padding: 15px;
}

.modal-body {
  padding: 15px;
}

.modal-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  border-top: 1px solid #eee;
  padding: 15px;
}

.modal-header h3 {
  margin: 0;
  font-size: 18px;
}

.modal-header button {
  appearance: none;
  border: 0;
  background: transparent;
  font-size: 24px;
  color: #999;
  cursor: pointer;
}

.modal-footer button {
  appearance: none;
  font-size: 14px;
  padding: 8px 16px;
  border-radius: 4px;
  background: #007bff;
  color: white;
  border: 0;
  cursor: pointer;
}
</style>
