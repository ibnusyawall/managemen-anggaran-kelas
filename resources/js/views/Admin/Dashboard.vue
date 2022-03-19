<template>
  <div>
    <CardStatistics />
    <b-card class="mb-4" no-body>
      <b-card-body>
        <AnggaranChart/>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import { mapState } from "vuex";
import CardStatistics from "./components/CardStatistics.vue";
import AnggaranChart from "./components/AnggaranChart.vue";

export default {
  data() {
    return {
      //
    };
  },
  computed: {
    ...mapState({
      login_success: (state) => state.login_success,
      user: (state) => state.user,
    }),
  },
  components: {
    CardStatistics,
    AnggaranChart
  },
};
</script>
