<template>
  <div class="service-info" id="serviceInfor">
    <div class="service">
      <!-- end row-->

      <h4 class="mt-4">Service</h4>

      <p class="text-muted mb-2">
        Fill the form below so we can send you the order's invoice.
      </p>

      <form>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="new-adr-first-name">Service Name</label>
              <input
                class="form-control"
                type="text"
                placeholder="Enter your first name"
                id="new-adr-first-name"
              />
            </div>
          </div>
        </div>
        <!-- end row-->
      </form>

      <h4 class="mt-4">Doctor</h4>

      <p class="text-muted mb-2">
        Fill the form below so we can send you the order's invoice.
      </p>

      <form>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="new-adr-first-name">Doctor Name</label>
              <input
                class="form-control"
                type="text"
                placeholder="Enter your first name"
                id="new-adr-first-name"
              />
            </div>
          </div>
        </div>
        <!-- end row-->
      </form>

      <h4 class="mt-4">Time Booking</h4>

      <p class="text-muted mb-2">
        Fill the form below so we can send you the order's invoice.
      </p>

      <form>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="new-adr-first-name">Date</label>
              <input
                class="form-control"
                type="text"
                placeholder="Enter your first name"
                id="new-adr-first-name"
              />
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="new-adr-first-name">Time</label>
              <input
                class="form-control"
                type="text"
                placeholder="Enter your first name"
                id="new-adr-first-name"
              />
            </div>
          </div>
        </div>
        <!-- end row-->
      </form>

      <h4 class="mt-4">Saved Address</h4>

      <p class="text-muted mb-3">
        Fill the form below in order to send you the order's invoice.
      </p>

      <div class="row">
        <div class="col-md-6">
          <div
            class="border p-3 rounded mb-3 mb-md-0"
            style="min-height: 240px"
          >
            <address class="mb-0 font-14 address-lg" :disabled="true">
              <div class="custom-control custom-radio mb-3">
                <input
                  type="radio"
                  id="customRadio1"
                  name="customRadio"
                  class="custom-control-input"
                  checked=""
                  value="0"
                />
                <label
                  class="custom-control-label font-16 font-weight-bold"
                  for="customRadio1"
                  >Home</label
                >
              </div>
              <!-- end row -->
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="new-adr-address">Address</label>
                    <input
                      class="form-control"
                      type="text"
                      placeholder="Enter full address"
                      id="new-adr-address"
                      disabled
                    />
                  </div>
                </div>
              </div>
              <span class="font-weight-semibold">Stanley Jones</span>
              <br />
              795 Folsom Ave, Suite 600<br />
              San Francisco, CA 94107<br />
              <abbr title="Phone">P:</abbr> (123) 456-7890
              <br />
            </address>
          </div>
        </div>
        <div class="col-md-6">
          <div class="border p-3 rounded" style="min-height: 240px">
            <address class="mb-0 font-14 address-lg">
              <div class="custom-control custom-radio mb-3">
                <input
                  type="radio"
                  id="customRadio2"
                  name="customRadio"
                  class="custom-control-input"
                  value="1"
                />
                <label
                  class="custom-control-label font-16 font-weight-bold"
                  for="customRadio2"
                  >Clinic</label
                >
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="new-adr-address">Address</label>
                    <select class="form-control custom-select" disabled>
                      <option value="">-- Choose --</option>
                      <option value="name">Name</option>
                      <option value="email">Email</option>
                      <option value="phone">Phone</option>
                      <option value="birthday">Birthday</option>
                      <option value="role">Role</option>
                    </select>
                  </div>
                </div>
              </div>
              <span class="font-weight-semibold">Stanley Jones</span>
              <br />
              795 Folsom Ave, Suite 600<br />
              San Francisco, CA 94107<br />
              <abbr title="Phone">P:</abbr> (123) 456-7890
              <br />
            </address>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  // component properties and methods
});
</script>
