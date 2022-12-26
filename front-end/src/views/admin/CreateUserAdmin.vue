<template>
  <div class="create-user">
    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">Hyper</a>
              </li>
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">eCommerce</a>
              </li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
          <h4 class="page-title">Create User</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <Form @submit="createUser" :validation-schema="schema">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4" class="col-form-label"
                    >Email <span class="text-red">*</span></label
                  >
                  <Field name="email" v-slot="{ field }">
                    <input
                      v-model="user.email"
                      v-bind="field"
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder="Email"
                    />
                  </Field>
                  <ErrorMessage name="email" class="invalid-feedback" />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4" class="col-form-label"
                    >Role <span class="text-red">*</span></label
                  >
                  <Field
                    name="role"
                    as="select"
                    id="role"
                    v-model="user.role"
                    class="form-control"
                  >
                    <option value="" disabled selected>- Choose -</option>
                    <option value="0">Admin</option>
                    <option value="1">Doctor</option>
                  </Field>
                  <ErrorMessage name="role" class="invalid-feedback" />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="col-form-label">Name</label>
                  <Field
                    name="name"
                    type="text"
                    v-model="user.name"
                    class="form-control"
                    id="name"
                    placeholder="Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState" class="col-form-label"
                    >Birth Day</label
                  >
                  <Field
                    name="birthday"
                    type="date"
                    v-model="user.birthday"
                    id="birth-day"
                    class="form-control"
                  />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label class="col-form-label">Phone</label>
                  <div class="input-group">
                    <Field
                      name="phone"
                      type="text"
                      v-model="user.phone"
                      class="form-control"
                      id="phone"
                      placeholder="Phone"
                    />
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputZip" class="col-form-label">Gender</label>
                  <Field
                    name="gender"
                    as="select"
                    id="gender"
                    v-model="user.gender"
                    class="form-control"
                  >
                    <option value="" disabled selected>- Choose -</option>
                    <option value="0">Female</option>
                    <option value="1">Male</option>
                  </Field>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label for="file" class="col-form-label">Avatar </label>
                  <Field
                    type="file"
                    name="avatar"
                    class="ml-2"
                    id="avatar"
                    @change="onFileChange"
                    accept=".jpg, .jpeg, .png"
                  />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label for="inputAddress" class="col-form-label"
                    >Address</label
                  >
                  <Field
                    name="address"
                    type="text"
                    class="form-control"
                    id="address"
                    placeholder="Address"
                    v-model="user.address"
                  />
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- pending -->
                <div class="form-group mb-0 text-center">
                  <div
                    :class="{ 'spinner-border text-primary': isPending }"
                    role="status"
                  ></div>
                </div>
              </div>

              <!-- end pending  -->
            </Form>
            <!-- end row -->
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card-->
      </div>
      <!-- end col-->
    </div>

    <!-- footer -->
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
  data() {
    const schema = yup.object().shape({
      email: yup
        .string()
        .required("Email is required!")
        .email("Email is invalid!")
        .max(50, "Must be maximum 50 characters!"),
      role: yup.string().required("Role is required!").notOneOf(["- Choose -"]),
      phone: yup.string().nullable(),
      name: yup.string().nullable(),
      birthday: yup.string().nullable(),
      gender: yup.string().notOneOf(["- Choose -"]).nullable(),
      avatar: yup.mixed().nullable(),
      address: yup.string().nullable(),
    });
    const user = {
      email: "",
      role: "",
      phone: "",
      name: "",
      birthday: "",
      gender: "",
      avatar: "",
      address: "",
    };
    return {
      user,
      schema,
      isPending: false,
    };
  },
  methods: {
    onFileChange(event: any) {
      this.user.avatar = event.target.files[0];
    },
    createUser() {
      this.isPending = true;
      // this.user.avatar = (this.$refs.avatarRef as any).files[0];
      // Tạo một FormData từ form
      const formData = new FormData();
      // Thêm tệp vào FormData
      Object.entries(this.user).forEach((entry) => {
        const [key, value] = entry;
        formData.append(key, value);
      });
      // formData.append("avatar", this.user.avatar);
      UserService.createUser(formData)
        .then((response: any) => {
          this.isPending = false;
          Notification.success(response.data.message);
          this.user = {
            email: "",
            role: "",
            phone: "",
            name: "",
            birthday: "",
            gender: "",
            avatar: "",
            address: "",
          };
        })
        .catch((error) => {
          Notification.error(error.response.data.message);
          this.isPending = false;
        });
    },
  },
});
</script>
