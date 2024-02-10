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
          color: "red",
        },
      },
      dataLabels: {
        enabled: false,
      },
      colors: ["#F44336", "#E91E63", "#9C27B0"],
      fill: {
        colors: ["#F44336", "#E91E63", "#9C27B0"],
      },
      xaxis: {
        categories: [
          "Cardiology",
          "Orthopedics",
          "Radiology",
          "Emergency Medicine",
          "Neurology",
        ],
      },
    });
    const columns = [
      {
        name: "patientId",
        label: "Patient ID",
        align: "left",
        field: "app_patient_id",
      },
      {
        name: "patientName",
        label: "Patient Name",
        align: "left",
        field: "app_full_name",
      },
      {
        name: "department",
        label: "Department",
        align: "left",
        field: "app_department",
      },
      {
        name: "status",
        label: "Status",
        align: "left",
        field: "app_is_accepted",
      },
      {
        name: "appointment",
        label: "Appointment",
        align: "left",
        field: (row) => `${row.app_time}, ${row.app_date}`,
      },
      {
        name: "doctorAssigned",
        label: "Doctor Assigned",
        align: "left",
        field: "app_doctor_id",
      },
      {
        name: "action",
        label: "Actions",
        align: "left",
        field: "action",
      },
    ];
    const appointment = ref([]);
    const columns2 = [
      {
        name: "doctorPicture",
        required: true,
        label: " ",
        align: "left",
        field: "doctor_signature",
        format: (val) => `${val}`,
        sortable: true,
      },
      {
        name: "doctorName",
        required: true,
        label: "Doctor Name",
        align: "left",
        field: (row) => `${row.doctor_first_name} ${row.doctor_surname}`,
        sortable: true,
      },
      {
        name: "department",
        required: true,
        label: "Department",
        align: "left",
        field: "doctor_department",
        format: (val) => `${val}`,
        sortable: true,
      },
    ];
    const rows2 = ref([]);
    const appointments_today = ref([]);
    const appointments_done = ref([]);

    const filter_appointments = () => {
      const today = new Date().toISOString().split("T")[0]; // Get today's date in 'YYYY-MM-DD' format

      // Filter appointments that match today's date
      appointments_today.value = appointment.value.filter(
        (appointment) => appointment.app_date === today
      );
      appointments_done.value = appointment.value.filter(
        (appointment) => appointment.app_is_accepted === 3
      );

      console.log("Appointments for today", rows2.value);
    };

    const getAppointment = async () => {
      const response = await FetchItems("app_forms");
      appointment.value = response.data;
      filter_appointments();
      console.log("appointment", appointment);
    };
    const getDoctors = async () => {
      let response = await FetchItems("doctor_profs");
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
      appointment,
      columns2,
      rows2,
      appointments_today,
      appointments_done,
    };
  },
};
