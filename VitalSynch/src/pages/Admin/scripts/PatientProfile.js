import { FetchItems, FetchItem } from "src/pages/composables";
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useQuasar } from "quasar";

export default {
  setup() {
    const $q = useQuasar();

    function checkFileSize(files) {
      return files.filter((file) => file.size < 4048);
    }

    function onRejected(rejectedEntries) {
      $q.notify({
        type: "negative",
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`,
      });
    }
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
        name: "app_doctor_name",
        label: "Doctor Assigned",
        align: "left",
        field: "app_doctor_name",
      },
    ];

    // Example usage:
    console.log(columns);

    const rows = ref([]);
    const ptnt_appointments = ref([]);
    const route = useRoute();
    const id = route.params.id;

    const filter_appointments = () => {
      // Filter appointments that patient id
      console.log("id", route.params.id);
      ptnt_appointments.value = rows.value.filter(
        (appointment) => appointment.app_patient_id === route.params.id
      );

      console.log("Appointments for today", rows.value);
    };

    const getAppointment = async () => {
      const response = await FetchItems("app_forms");
      rows.value = response.data;
      filter_appointments();
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
      await getAppointment();
      await getPatientProfile();
    });

    return {
      columns,
      rows,
      filter: ref(""),
      ptnt_appointments,
      patient,
      checkFileSize,
      onRejected,
    };
  },
};
