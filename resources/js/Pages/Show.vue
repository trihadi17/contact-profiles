<template>
  <section>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <span class="title-header">Show</span>

            <section class="my-3">
              <div class="form-group mb-2">
                <label for="name" class="col-12">Full Name</label>
                <span class="btn btn-sm btn-primary">{{ contact.name }}</span>
              </div>

              <div class="form-group mb-2">
                <label for="email_address" class="col-12">Email Address</label>
                <span class="btn btn-sm btn-primary">{{
                  contact.email_address
                }}</span>
              </div>

              <div class="form-group mb-2">
                <label for="phone_number" class="col-12">Phone Number</label>
                <span class="btn btn-sm btn-primary">{{
                  contact.phone_number
                }}</span>
              </div>

              <div class="form-group mb-2">
                <label for="address" class="col-12">Address</label>
                <span class="btn btn-sm btn-primary">{{
                  contact.address
                }}</span>
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
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      //* Get Data
      this.axios.get(`/api/show/${this.$route.params.id}`).then((response) => {
        this.contact = response.data.data;
      });
    },
  },
};
</script>