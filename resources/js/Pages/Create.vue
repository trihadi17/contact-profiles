<template>
  <section>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <span class="title-header">Create</span>
            <!-- Form Tambah -->
            <section class="my-3">
              <div class="row">
                <div class="col-12">
                  <form @submit.prevent="onSubmit">
                    <div class="form-group mb-2">
                      <label for="name">Full Name</label>
                      <input
                        v-model="contact.name"
                        class="form-control"
                        placeholder="Full Name"
                      />
                      <span class="form-text text-danger" v-if="errors.name">{{
                        errors.name[0]
                      }}</span>
                    </div>

                    <div class="form-group mb-2">
                      <label for="email_address">Email Address</label>
                      <input
                        v-model="contact.email_address"
                        class="form-control"
                        placeholder="Email Address"
                      />
                      <span
                        class="form-text text-danger"
                        v-if="errors.email_address"
                        >{{ errors.email_address[0] }}</span
                      >
                    </div>

                    <div class="form-group mb-2">
                      <label for="phone_number">Phone Number</label>
                      <input
                        v-model="contact.phone_number"
                        class="form-control"
                        placeholder="Phone Number"
                      />
                      <span
                        class="form-text text-danger"
                        v-if="errors.phone_number"
                        >{{ errors.phone_number[0] }}</span
                      >
                    </div>

                    <div class="form-group mb-2">
                      <label for="address">Address</label>
                      <input
                        v-model="contact.address"
                        class="form-control"
                        placeholder="Address"
                      />
                      <span
                        class="form-text text-danger"
                        v-if="errors.address"
                        >{{ errors.address[0] }}</span
                      >
                    </div>

                    <div class="form-group mt-2" style="float: right">
                      <router-link
                        :to="{ name: 'home' }"
                        class="btn btn-sm btn-secondary"
                        style="margin-right: 5px"
                        >Cancel</router-link
                      >
                      <button class="btn btn-sm btn-success ml-2" type="submit">
                        Create
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      contact: {},
      errors: {
        name: "",
        email_address: "",
        phone_number: "",
        address: "",
      },
    };
  },
  methods: {
    onSubmit() {
      this.axios
        .post(`/api/store`, this.contact)
        .then((response) => {
          this.$router.push({ name: "home" });
          this.$notify({ title: response.data.message, type: "success" });
        })
        .catch((err) => {
          this.errors.name = err.response.data.errors.name;
          this.errors.email_address = err.response.data.errors.email_address;
          this.errors.phone_number = err.response.data.errors.phone_number;
          this.errors.address = err.response.data.errors.address;
        });
    },
  },
};
</script>