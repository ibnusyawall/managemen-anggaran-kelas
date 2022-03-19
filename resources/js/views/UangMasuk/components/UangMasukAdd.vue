<template>
  <div>
    <b-card class="mb-4" no-body>
      <b-card-body>
        <h4 class="card-title">Tambah Data</h4>
        <form ref="form" enctype="multipart/form-data">
          <b-row>
            <b-col>
              <b-form-group label="Nominal" label-for="nominal">
                <input
                  id="nominal"
                  v-model="form.nominal"
                  type="number"
                  :class="'form-control'"
                  autofocus
                  required
                />
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Tanggal" label-for="tanggal">
                <input
                  id="tanggal"
                  v-model="form.tanggal"
                  type="date"
                  :class="'form-control'"
                  disabled
                />
              </b-form-group>
            </b-col>
          </b-row>
          <b-button variant="outline-primary" size="sm" @click="add"
            >Tambah</b-button
          >
        </form>
        <h6 class="card-subtitle font-weight-normal text-muted"></h6>
      </b-card-body>
    </b-card>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        nominal: null,
        tanggal: this.getDate(),
      },
    };
  },
  methods: {
    getDate() {
      var date = new Date();
      return `${date.getFullYear()}-${
        date.getMonth() <= 10 ? `0${date.getMonth()}` : `${date.getMonth()}`
      }-${date.getDate() <= 10 ? `0${date.getDate()}` : `${date.getDate()}`}`;
    },
    add() {
      axios
        .post("/api/v1/uang-masuk", this.form)
        .then(() => {
          this.modalConfirm(
            "Konfirmasi",
            "Data berhasil ditambah",
            "success",
            true
          );
        })
        .catch((e) => {
          console.log("e:", e);
          console.log(this.form);
          this.modalConfirm(
            "Konfirmasi",
            "Data gagal ditambah",
            "danger",
            false
          );
        });
    },
    modalConfirm(title, msg, type, go = false) {
      this.$bvModal
        .msgBoxOk(msg, {
          title: title,
          size: "md",
          buttonSize: "md",
          okVariant: type,
          headerClass: "p-2 border-bottom-0",
          footerClass: "p-2 border-top-0",
          centered: true,
        })
        .then((value) => {
          if (go) {
            this.$router.go(0);
          }
        })
        .catch((err) => {
          // An error occurred
        });
    },
  },
};
</script>
