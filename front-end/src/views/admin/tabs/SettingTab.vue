<template>
  <div class="setting-tab" id="settings">
    <Form @submit="saveUser" :validation-schema="schema">
      <h5 class="mb-4 text-uppercase">
        <i class="mdi mdi-account-circle mr-1"></i> Personal Info
      </h5>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-form-label"
              >Email <span class="text-red">*</span></label
            >

            <div class="input-group">
              <Field
                name="email"
                v-model="user.email"
                v-slot="{ field, errors }"
              >
                <input
                  v-bind="field"
                  class="form-control"
                  type="email"
                  placeholder="Email"
                  :disabled="isButtonDisabled.email"
                  :class="{
                    'is-invalid': !!errors.length,
                  }"
                />
              </Field>
              <div class="input-group-append">
                <button
                  type="button"
                  class="input-group-text"
                  @click="isButtonDisabled.email = !isButtonDisabled.email"
                >
                  <i class="dripicons-document-edit"></i>
                </button>
              </div>
            </div>
            <ErrorMessage name="email" class="invalid-feedback" />
            <span class="form-text text-muted"
              ><small
                >If you want to change email please
                <a
                  href="#"
                  @click="isButtonDisabled.email = !isButtonDisabled.email"
                  >click</a
                >
                here.</small
              ></span
            >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-form-label">Pasword</label>
            <div class="input-group">
              <input
                type="password"
                name="password"
                class="form-control"
                :disabled="isButtonDisabled.password"
              />
              <div class="input-group-append">
                <button
                  type="button"
                  class="input-group-text"
                  @click="showModal = true"
                >
                  <i class="dripicons-document-edit"></i>
                </button>
              </div>
            </div>
            <span class="form-text text-muted"
              ><small
                >If you want to change password please
                <a href="javascript: void(0);" @click="showModal = true"
                  >click</a
                >
                here.</small
              ></span
            >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label class="col-form-label">Name</label>
          <input
            type="text"
            v-model="user.name"
            class="form-control"
            id="name"
          />
        </div>
        <div class="form-group col-md-6">
          <label class="col-form-label">Phone</label>
          <div class="input-group">
            <input
              type="text"
              v-model="user.phone"
              class="form-control"
              id="phone"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputState" class="col-form-label">Birth Day</label>
          <input
            type="date"
            v-model="user.birthday"
            id="birth-day"
            class="form-control"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="inputZip" class="col-form-label">Gender</label>
          <select id="gender" v-model="user.gender" class="form-control">
            <option value="-1">- Choose -</option>
            <option value="0">Female</option>
            <option value="1">Male</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-form-label">Avatar </label>
            <input
              type="file"
              name="avatar"
              class="ml-2"
              id="avatar"
              @change="onFileChange"
              accept=".jpg, .jpeg, .png"
            />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="inputAddress" class="col-form-label">Address</label>
            <input
              type="text"
              class="form-control"
              id="address"
              placeholder="1234 Main St"
              v-model="user.address"
            />
          </div>
        </div>
      </div>
      <!-- end row -->

      <h5 class="mb-3 mt-3 text-uppercase bg-light p-2">
        <i class="mdi mdi-office-building mr-1"></i> Company Info
      </h5>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="companyname">Company Name</label>
            <input
              type="text"
              class="form-control"
              id="companyname"
              placeholder="Enter company name"
            />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="cwebsite">Website</label>
            <input
              type="text"
              class="form-control"
              id="cwebsite"
              placeholder="Enter website url"
            />
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <h5 class="mb-3 mt-3 text-uppercase bg-light p-2">
        <i class="mdi mdi-earth mr-1"></i> Social
      </h5>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="social-fb">Facebook</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="mdi mdi-facebook"></i
                ></span>
              </div>
              <input
                type="text"
                class="form-control"
                id="social-fb"
                placeholder="Url"
              />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="social-tw">Twitter</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="mdi mdi-twitter"></i
                ></span>
              </div>
              <input
                type="text"
                class="form-control"
                id="social-tw"
                placeholder="Username"
              />
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="social-insta">Instagram</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="mdi mdi-instagram"></i
                ></span>
              </div>
              <input
                type="text"
                class="form-control"
                id="social-insta"
                placeholder="Url"
              />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="social-lin">Linkedin</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="mdi mdi-linkedin"></i
                ></span>
              </div>
              <input
                type="text"
                class="form-control"
                id="social-lin"
                placeholder="Url"
              />
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="social-sky">Skype</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="mdi mdi-skype"></i
                ></span>
              </div>
              <input
                type="text"
                class="form-control"
                id="social-sky"
                placeholder="@username"
              />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="social-gh">Github</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="mdi mdi-github-circle"></i
                ></span>
              </div>
              <input
                type="text"
                class="form-control"
                id="social-gh"
                placeholder="Username"
              />
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="text-right">
        <button type="submit" class="btn btn-primary mt-2">
          <i class="mdi mdi-content-save"></i> Save
        </button>
      </div>

      <!-- pending -->
      <div class="form-group mb-0 text-center">
        <div
          :class="{ 'spinner-border text-primary': isPending }"
          role="status"
        ></div>
      </div>
      <!-- end pending  -->
    </Form>
    <transition name="modal">
      <!-- @click="showModal = false" -->
      <div
        v-if="showModal"
        id="standard-modal"
        class="modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="standard-modalLabel"
        aria-modal="true"
        style="padding-right: 17px; display: block"
      >
        <div class="modal-dialog">
          <div class="modal-content dropdown-menu-animated" @click.stop>
            <Form @submit="changPassword" :validation-schema="schemaChangePass">
              <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="standard-modalLabel">
                  Change Password
                </h4>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-hidden="true"
                  @click="(showModal = false), clearUserPassword"
                >
                  ×
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-form-label">Current Password</label>
                      <Field
                        name="current_password"
                        v-model="userPassword.current_password"
                        v-slot="{ field, errors, meta }"
                      >
                        <input
                          v-bind="field"
                          type="password"
                          class="form-control"
                          placeholder="Password"
                          :class="{
                            'is-invalid': !!errors.length,
                            'is-valid': meta.valid && meta.touched,
                          }"
                        />
                      </Field>
                      <ErrorMessage
                        name="current_password"
                        class="invalid-feedback mt-1"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-form-label">New Password</label>
                      <Field
                        name="password"
                        v-model="userPassword.password"
                        v-slot="{ field, errors, meta }"
                      >
                        <input
                          v-bind="field"
                          type="password"
                          class="form-control"
                          placeholder="Password"
                          :class="{
                            'is-invalid': !!errors.length,
                            'is-valid': meta.valid && meta.touched,
                          }"
                        />
                      </Field>
                      <ErrorMessage
                        name="password"
                        class="invalid-feedback mt-1"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-form-label">Confirm New Password</label>
                      <Field
                        name="password_confirmation"
                        v-model="userPassword.password_confirmation"
                        v-slot="{ field, errors, meta }"
                      >
                        <input
                          v-bind="field"
                          type="password"
                          class="form-control"
                          placeholder="Password"
                          :class="{
                            'is-invalid': !!errors.length,
                            'is-valid': meta.valid && meta.touched,
                          }"
                        />
                      </Field>
                      <ErrorMessage
                        name="password_confirmation"
                        class="invalid-feedback mt-1"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <!-- pending -->
                <div class="form-group mb-0 text-center">
                  <div
                    :class="{
                      'spinner-border text-primary': isPendingPassword,
                    }"
                    role="status"
                  ></div>
                </div>
                <!-- end pending  -->
                <button
                  type="button"
                  class="btn btn-light"
                  data-dismiss="modal"
                  @click="(showModal = false), clearUserPassword"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">
                  <i class="mdi mdi-content-save"></i> Save
                </button>
              </div>
            </Form>
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
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import UserService from "@/services/user.service";
import Notification from "@/services/notification.service";

export default defineComponent({
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  props: ["modelValue"],
  emits: ["update:modelValue"],
  computed: {
    user(): any {
      return {
        address: this.modelValue.address,
        avatar: null,
        birthday: this.modelValue.birthday,
        created_at: this.modelValue.created_at,
        email: this.modelValue.email,
        gender: this.modelValue.gender,
        id: this.modelValue.id,
        name: this.modelValue.name,
        phone: this.modelValue.phone,
        role: this.modelValue.role,
        roleName: this.modelValue.roleName,
        updated_at: this.modelValue.updated_at,
      };
    },
  },
  data() {
    const schema = yup.object().shape({
      email: yup
        .string()
        .required("Email is required!")
        .email("Email is invalid!")
        .max(50, "Must be maximum 50 characters!"),
    });
    const schemaChangePass = yup.object().shape({
      current_password: yup
        .string()
        .required("Password is required!")
        .min(6, "Must be at least 6 characters!")
        .max(40, "Must be maximum 40 characters!"),
      password: yup
        .string()
        .required("Password is required!")
        .min(6, "Must be at least 6 characters!")
        .max(40, "Must be maximum 40 characters!"),
      password_confirmation: yup
        .string()
        .required("Password is required!")
        .min(6, "Must be at least 6 characters!")
        .max(40, "Must be maximum 40 characters!")
        .oneOf([yup.ref("password"), null], "Passwords must match"),
    });
    const userPassword: any = {
      current_password: "",
      password: "",
      password_confirmation: "",
    };
    const avatar: any = this.modelValue.avatar;
    return {
      userPassword,
      avatar,
      schema,
      schemaChangePass,
      showModal: false,
      isPending: false,
      isPendingPassword: false,
      isButtonDisabled: {
        email: true,
        password: true,
      },
    };
  },
  methods: {
    saveUser() {
      this.isPending = true;
      const formData = new FormData();
      formData.append("_method", "PUT");
      Object.entries(this.user).forEach((entry) => {
        const [key, value] = entry;
        if (typeof value === "string") {
          formData.append(key, value);
        } else if (typeof value === "number") {
          formData.append(key, value.toString());
        } else if (value instanceof Blob) {
          formData.append(key, value);
        } else {
          console.error(`Invalid value for key "${key}": ${value}`);
        }
      });
      if (this.$route.params.id) {
        UserService.updateUserByID(formData, this.$route.params.id)
          .then((response) => {
            this.isPending = false;
            Notification.success(response.data.message);
            // update value user for profile
            this.updateValue(response.data.data.user);
          })
          .catch((error) => {
            Notification.error(error.response.data.message);
            this.isPending = false;
          });
      } else {
        UserService.updateProfile(formData)
          .then((response) => {
            this.isPending = false;
            Notification.success(response.data.message);
            // update value user for profile
            this.updateValue(response.data.data.user);
            // update authAdmin
            this.updateAuthAdmin(response.data.data.user);
          })
          .catch((error) => {
            Notification.error(error.response.data.message);
            this.isPending = false;
          });
      }
    },
    updateAuthAdmin(user: any) {
      this.$store.state.authAdmin.admin.name = user.name;
      this.$store.state.authAdmin.admin.roleName = user.roleName;
      this.$store.state.authAdmin.admin.role = user.role;
      this.$store.state.authAdmin.admin.avatar = user.avatar;
      try {
        const admin = JSON.parse(localStorage.getItem("tokenadmin") || "[]");
        admin.name = user.name;
        admin.roleName = user.roleName;
        admin.role = user.role;
        admin.avatar = user.avatar;
        try {
          localStorage.setItem("tokenadmin", JSON.stringify(admin));
          // Do something with the parsed data
        } catch (e) {
          console.error("Error parsing JSON: ", e);
        }
      } catch (e) {
        console.error("Error parsing or updating tokenadmin JSON:", e);
      }
    },
    changPassword() {
      this.isPendingPassword = true;
      //Login again when change password
      if (this.$route.params.id) {
        UserService.changePasswordUser(this.userPassword, this.$route.params.id)
          .then(() => {
            Notification.success(
              "Change password success, please login again!"
            );
            this.isPendingPassword = false;
            this.clearUserPassword();
          })
          .catch((error) => {
            Notification.error(error.response.data.message);
            this.isPendingPassword = false;
            this.clearUserPassword();
          });
      } else {
        UserService.changePasswordProfile(this.userPassword)
          .then(() => {
            this.$store.dispatch("authAdmin/logout");
            this.$router.push({ name: "admin-login" });
            Notification.success("Change password success, please login!");
            this.isPendingPassword = false;
          })
          .catch((error) => {
            Notification.error(error.response.data.message);
            this.isPendingPassword = false;
            this.clearUserPassword();
          });
      }
    },
    updateValue(user: any) {
      this.$emit("update:modelValue", user); // previously was `this.$emit('input', title)`
    },
    onFileChange(event: any) {
      this.user.avatar = event.target.files[0];
    },
    clearUserPassword() {
      this.userPassword = {
        current_password: "",
        password: "",
        password_confirmation: "",
      };
    },
  },
  // component properties and methods
});
</script>
