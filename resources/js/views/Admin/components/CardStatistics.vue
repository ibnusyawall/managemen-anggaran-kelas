<template>
  <div>
    <b-row>
      <!-- <pre>{{ data }}</pre> -->
      <b-col cols="12" md="6" lg="6">
        <b-card class="mb-4">
          <h4 class="card-title mb-1">{{ length.uang_masuk | rupiah }}</h4>
          <b-card-text class="mb-2">Uang Masuk</b-card-text>
          <b-progress :value="length.uang_masuk" variant="success" :max="max"></b-progress>
        </b-card>
      </b-col>
      <b-col cols="12" md="6" lg="6">
        <b-card class="mb-4">
          <h4 class="card-title mb-1">{{ length.uang_keluar | rupiah }}</h4>
          <b-card-text class="mb-2">Uang Keluar</b-card-text>
          <b-progress
            variant="info"
            :value="length.uang_keluar"
            :max="max"
          ></b-progress>
        </b-card>
      </b-col>
    </b-row>
    <b-row>
      <b-col cols="12" md="12" lg="12">
        <b-card class="mb-4">
          <h4 class="card-title mb-1">{{ (length.uang_masuk - length.uang_keluar) | rupiah }}</h4>
          <b-card-text class="mb-2">Sisa Kas</b-card-text>
          <b-progress
            variant="danger"
            :value="length.uang_keluar"
            :max="max"
          ></b-progress>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>
<script>
export default {
  data() {
    return {
      data: {
        uang_masuk: null,
        uang_keluar: null,
      },
      length: {
        uang_masuk: null,
        uang_keluar: null,
      },
      max: 1000000
    };
  },
  beforeMount() {
    this.loadAllData();
  },
  methods: {
    loadAllData() {
      this.loadUangMasuk();
      this.loadUangKeluar();
    },
    loadUangMasuk() {
      this.$store
        .dispatch("uang_masuk/uang_masuks")
        .then((result) => {
          this.data.uang_masuk = [];
          result.map(({ nominal }) => (this.length.uang_masuk += nominal));
          console.log("uang-masuk:", result);
          this.data.uang_masuk = result;
        })
        .catch((e) => console.log(e));
    },
    loadUangKeluar() {
      this.$store
        .dispatch("uang_keluar/uang_keluars")
        .then((result) => {
          this.data.uang_keluar = [];
          result.map(({ nominal }) => (this.length.uang_keluar += nominal));
          console.log("uang_keluars:", result);
          this.data.uang_keluar = result;
        })
        .catch((e) => console.log(e));
    },
  },
  filters: {
    rupiah(self) {
      return `Rp. ${self.toLocaleString("ID-id")}`;
    },
  },
};
</script>

