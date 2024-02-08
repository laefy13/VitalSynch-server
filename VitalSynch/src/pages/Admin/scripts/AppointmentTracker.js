import { FetchItems } from "src/pages/composables";
import { ref, onMounted } from "vue";

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

    // Example usage:
    console.log(columns);

    const rows = ref([]);

    const getAppointment = async () => {
      const response = await FetchItems("app_forms");
      rows.value = response.data;

      console.log("rows", rows);
    };

    // Use dummy data for testing
    // Comment out this block when you have the actual API to fetch data from
    onMounted(async () => {
      getAppointment();
    });

    return {
      columns,
      rows,
      filter: ref(""),
    };
  },
};
