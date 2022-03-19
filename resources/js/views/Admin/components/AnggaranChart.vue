
<template>
  <div id="app">
    <fusioncharts
      :type="type"
      :width="width"
      :height="height"
      :dataFormat="dataFormat"
      :dataSource="dataSource"
    >
    </fusioncharts>
  </div>
</template>
<script>
import Vue from "vue";
import VueFusionCharts from "vue-fusioncharts";
import FusionCharts from "fusioncharts";
import Charts from "fusioncharts/fusioncharts.charts";
import FusionTheme from "fusioncharts/themes/fusioncharts.theme.fusion";

Vue.use(VueFusionCharts, FusionCharts, Charts, FusionTheme);

const categories = [
  {
    category: [],
  },
];

const dataset = [
  {
    seriesname: "Anggaran",
    data: [],
  },
];

const dataSource = {
  chart: {
    caption: "Statistik Anggaran Yang di Keluarkan",
    xaxisname: "Tanggal",
    yaxisname: "Nominal",
    theme: "fusion",
  },
  categories: categories,
  dataset: dataset,
};

export default {
  data() {
    return {
      type: "mscolumn2d",
      width: "1100",
      height: "400",
      dataFormat: "json",
      dataSource: dataSource,
    };
  },
  mounted() {
    console.log("dataset", dataset);
  },
  beforeMount() {
    this.loadUangKeluar();
  },
  methods: {
    loadUangKeluar() {
      this.$store
        .dispatch("uang_keluar/uang_keluars")
        .then((result) => {
          var options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
          };
          result.map(({ nominal, tanggal }) => {
            categories[0].category.push({
              label: new Date(tanggal).toLocaleString("id-ID", options),
            });
            dataset[0].data.push({
              value: nominal,
            });
          });
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>
