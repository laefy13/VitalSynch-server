import { FetchItems, FetchItem } from "src/pages/composables";
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";

export default {
  setup() {
    const columns = [
      {
        name: "app_date",
        label: "Date",
        align: "left",
        field: "app_date",
      },
      {
        name: "app_time",
        label: "Time",
        align: "left",
        field: "app_time",
      },
      {
        name: "app_department",
        label: "Department",
        align: "left",
        field: "app_department",
      },
      {
        name: "app_doctor_id",
        label: "Doctor Assigned",
        align: "left",
        field: "app_doctor_id",
      },
    ];

    // Example usage:
    console.log(columns);

    const rows = ref([]);
    const ptnt_appointments = ref([]);
    const router = useRoute();
    const id = router.params.id;

    const filter_appointments = () => {
      // Filter appointments that match today's date
      ptnt_appointments.value = rows.value.filter(
        (appointment) => appointment.app_patient_id === id
      );

      console.log("Appointments for today", rows.value);
    };

    const getAppointment = async () => {
      const response = await FetchItems("app_forms");
      rows.value = response.data;

      console.log("rows", rows);
    };
    let patient = ref([]);
    const getPatientProfile = async () => {
      const response = await FetchItem("ptnt_prof", id);
      patient.value = response.data;

      console.log("patient", patient);
    };

    // Use dummy data for testing
    // Comment out this block when you have the actual API to fetch data from
    onMounted(async () => {
      getAppointment();
      getPatientProfile();
    });

    return {
      columns,
      rows,
      filter: ref(""),
      ptnt_appointments,
      patient,
    };
  },
};
