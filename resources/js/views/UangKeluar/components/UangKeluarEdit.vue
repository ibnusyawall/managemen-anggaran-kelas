<template>
  <div>
    <b-card class="mb-4" no-body>
      <b-card-body>
        <h4 class="card-title">Edit Data</h4>
        <form ref="form" enctype="multipart/form-data">
          <b-row>
            <b-col>
              <b-form-group label="Keperluan" label-for="keperluan">
                <input
                  id="keperluan"
                  v-model="form.keperluan"
                  type="text"
                  :class="'form-control'"
                  autofocus
                />
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Nominal" label-for="nominal">
                <input
                  id="nominal"
                  v-model="form.nominal"
                  type="number"
                  :class="'form-control'"
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
                />
              </b-form-group>
            </b-col>
          </b-row>
          <b-button variant="outline-primary" size="sm" @click="update"
            >Update</b-button
          >
        </form>
        <h6 class="card-subtitle font-weight-normal text-muted"></h6>
      </b-card-body>
    </b-card>
  </div>
</template>
<script>
export default {
    props: ['id_data'],
  data() {
    return {
      form: {
          keperluan: null,
          nominal: null,
          tanggal: null,
      },
    };
  },
  methods: {
      update() {
          this.$emit('updateData', { id: this.id_data, form: {...this.form }})
      },
      loadUangKeluar() {
          this.$store.dispatch('uang_keluar/uang_keluar', this.id_data)
            .then(result => {
                this.form.keperluan = result.keperluan
                this.form.nominal = result.nominal
                this.form.tanggal = result.tanggal
                console.log('uang_keluar:', result)
            })
            .catch(e => console.log(e))
      },
  },
  beforeMount() {
      this.loadUangKeluar()
  },
  components: {
    //
  },
};
</script>
