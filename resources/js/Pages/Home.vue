<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- Header -->
            <section>
              <span class="title-header">Dashboard</span>
            </section>
            <section>
              <!-- Tambah -->
              <router-link
                :to="{ name: 'create' }"
                class="btn btn-sm btn-success my-3"
              >
                Tambah Data
              </router-link>

              <!-- Table -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Addres</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(contact, index) in contacts" :key="index">
                    <th scope="row">
                      {{ contact.id }}
                    </th>
                    <th scope="row">
                      {{ contact.name }}
                    </th>
                    <th scope="row">
                      {{ contact.email_address }}
                    </th>
                    <th scope="row">
                      {{ contact.phone_number }}
                    </th>
                    <th scope="row">
                      {{ contact.address }}
                    </th>
                    <th>
                      <div class="btn-group btn-group-toggle">
                        <router-link
                          :to="{
                            name: 'edit',
                            params: { id: contact.id },
                          }"
                          class="btn btn-success btn-sm"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Update Keluhan"
                        >
                          <i class="pi pi-pencil" style="color: white"></i>
                        </router-link>
                        <router-link
                          :to="{
                            name: 'show',
                            params: { id: contact.id },
                          }"
                          class="btn btn-primary btn-sm"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Lihat Keluhan"
                        >
                          <i class="pi pi-eye" style="color: white"></i>
                        </router-link>
                        <button
                          class="btn btn-danger btn-sm"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="Hapus Keluhan"
                          @click="deleteData(contact.id)"
                        >
                          <i class="pi pi-trash" style="color: white"></i>
                        </button>
                      </div>
                    </th>
                  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      contacts: [],
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      this.axios.get(`/api`).then((response) => {
        this.contacts = response.data.data;
        console.log(this.contacts);
      });
    },
    deleteData(id) {
      //* Delete Data
      this.axios
        .delete(`/api/delete/` + id)
        .then((response) => {
          this.loadData();
          this.$notify({ title: response.data.message, type: "error" });
        })
        .catch((errors) => {
          this.$notify({ title: errors.response.data.message, type: "error" });
          console.log(errors.response.status);
        });
    },
  },
};
</script>




