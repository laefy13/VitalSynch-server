import { FetchItem } from "src/pages/composables";
import { ref, onMounted } from "vue";

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
        name: "app_doctor",
        label: "Doctor Assigned",
        align: "left",
        field: "app_doctor_name",
      },
      {
        name: "status",
        label: "Status",
        align: "left",
        field: "app_is_accepted",
      },
      {
        name: "action",
        label: "Action",
        align: "left",
        field: "action",
      },
    ];
    const rows = ref([]);
    let bar = ref(false);
    const selectedAppointment = ref([]);
    const handleViewAppointment = (row) => {
      bar.value = true;
      console.log(bar);
      selectedAppointment.value = row;
      console.log("Appointment", row);
    };

    const getAppointment = async () => {
      let response = await FetchItem(
        "app_form",
        localStorage.getItem("user_id")
      );

      rows.value = response.data;
    };

    onMounted(async () => {
      getAppointment();
    });

    return {
      columns,
      rows,
      filter: ref(""),
      bar,
      selectedAppointment,

      handleViewAppointment,
    };
  },
};
