import { ref, onMounted } from "vue";
import { FetchItems, FetchItem } from "src/pages/composables";
import { useRoute } from "vue-router";

export default {
  setup() {
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
    const rows = ref([]);
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
        field: "doctor_first_name",
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
        field: "doctor_department",
        format: (val) => `${val}`,
        sortable: true,
      },
    ];
    const rows2 = ref([]);
    const appointments_today = ref([]);
    const router = useRoute();
    const id = router.params.id;

    const filter_appointments = () => {
      const today = new Date().toISOString().split("T")[0]; // Get today's date in 'YYYY-MM-DD' format

      // Filter appointments that match today's date
      appointments_today.value = rows.value.filter(
        (appointment) => appointment.app_date === today
      );

      console.log("Appointments for today", rows2.value);
    };

    const getAppointment = async () => {
      const response = await FetchItems("app_forms");
      rows.value = response.data;
      filter_appointments();
      console.log("rows", rows);
    };
    const getDoctors = async () => {
      let response = await FetchItems("doctor_profs");
      rows2.value = response.data;
    };
    let patient = ref([]);
    const getPatientProfile = async () => {
      const response = await FetchItem(
        "ptnt_prof",
        localStorage.getItem("user_id")
      );
      patient.value = response.data;

      console.log("patient", patient);
    };
    onMounted(async () => {
      //getAppointment();
      getPatientProfile();
    });
    // Use dummy data for testing
    // Comment out this block when you have the actual API to fetch data from

    return {
      columns,
      rows,
      columns2,
      rows2,
      appointments_today,
      patient,
    };
  },
};
