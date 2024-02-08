import VueApexCharts from "vue3-apexcharts";
import { ref, onMounted } from "vue";
import { FetchItems } from "src/pages/composables";

export default {
  components: {
    apexchart: VueApexCharts,
  },
  setup() {
    const series = ref([
      {
        data: [400, 430, 448, 470, 540],
      },
    ]);
    const chartOptions = ref({
      chart: {
        type: "bar",
        height: 350,
      },
      plotOptions: {
        bar: {
          borderRadius: 5,
          horizontal: true,
        },
      },
      dataLabels: {
        enabled: false,
      },
      xaxis: {
        categories: [
          "South Korea",
          "Canada",
          "United Kingdom",
          "Netherlands",
          "Italy",
        ],
      },
    });
    const columns = [
      {
        name: "id",
        label: "#",
        field: "id",
        align: "left",
        sortable: true,
      },
      {
        name: "patientName",
        required: true,
        label: "Patient Name",
        align: "left",
        field: (row) => row.patientName,
        format: (val) => `${val}`,
        sortable: true,
      },
      {
        name: "assignedDoctor",
        required: true,
        label: "Assigned Doctor",
        align: "left",
        field: (row) => row.assignedDoctor,
        format: (val) => `${val}`,
        sortable: true,
      },
      {
        name: "time",
        required: true,
        label: "Time",
        align: "left",
        field: (row) => row.time,
        format: (val) => `${val}`,
        sortable: true,
      },
      {
        name: "department",
        required: true,
        label: "Department",
        align: "left",
        field: (row) => row.department,
        format: (val) => `${val}`,
        sortable: true,
      },
    ];
    const rows = ref([]);
    const columns2 = [
      {
        name: "doctorPicture",
        required: true,
        label: " ",
        align: "left",
        field: "doctorPicture",
        format: (val) =>
          `<img src="${val}" alt="Doctor Picture" width="50" height="50" />`,
        sortable: true,
      },
      {
        name: "doctorName",
        required: true,
        label: "Doctor Name",
        align: "left",
        field: "doctorName",
        format: (val) => `${val}`,
        sortable: true,
      },
      {
        name: "status",
        required: true,
        label: "Status",
        align: "left",
        field: "status",
        format: (val) => `${val}`,
        sortable: true,
      },
      {
        name: "department",
        required: true,
        label: "Department",
        align: "left",
        field: "department",
        format: (val) => `${val}`,
        sortable: true,
      },
    ];
    const rows2 = ref([]);
    const getAppointment = async () => {
      let response = await FetchItems("appointments");
      rows.value = response.data;
      console.log("rows", rows);
    };
    const getDoctors = async () => {
      let response = await FetchItems("doctors");
      rows2.value = response.data;
    };
    // Use dummy data for testing
    // Comment out this block when you have the actual API to fetch data from
    onMounted(async () => {
      getAppointment();
      getDoctors();
    });

    return {
      series,
      chartOptions,
      columns,
      rows,
      columns2,
      rows2,
    };
  },
};
