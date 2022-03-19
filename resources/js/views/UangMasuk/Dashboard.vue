<template>
  <div>
    <b-card class="mb-4" no-body>
      <b-card-body>
        <h4 class="card-title">Uang Masuk</h4>
        <b-button variant="outline-primary" size="sm" @click="add_data"
          >Tambah Data</b-button
        >
      </b-card-body>
      <UangMasukList @editData="editData" />
    </b-card>
    <template v-if="show_edit">
      <UangMasukEdit :id_data="id_data" @updateData="updateData" />
    </template>
    <template v-if="show_add">
      <UangMasukAdd />
    </template>
  </div>
</template>

<script>
import UangMasukList from "./components/UangMasukList.vue";
import UangMasukAdd from "./components/UangMasukAdd.vue";
import UangMasukEdit from "./components/UangMasukEdit.vue";

export default {
  data() {
    return {
      show_add: false,
      show_edit: false,
    };
  },
  methods: {
    add_data() {
      this.show_add = !this.show_add;
    },
    editData({ id }) {
      this.id_data = id;

      this.show_edit = !this.show_edit;
      console.log("id: ", id);
    },
    updateData({ id, form }) {
      console.log("edit formL:", form);

      axios
        .put(`/api/v1/uang-masuk/${id}`, form)
        .then((result) => {
          console.log("updated success", result);
          this.modalConfirm('Konfirmasi', 'Data berhasil di update', 'success', true);
        })
        .catch((e) => {
          this.modalConfirm('Konfirmasi', 'Data gagal di update', 'danger', false);
          console.log("error:", e);
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
  components: {
    UangMasukList,
    UangMasukAdd,
    UangMasukEdit,
  },
};
</script>
