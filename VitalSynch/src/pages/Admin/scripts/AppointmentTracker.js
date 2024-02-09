import { FetchItems, UpdateItem } from "src/pages/composables";
import { ref, onMounted, computed } from "vue";

export default {
  setup() {
    const pending_columns = [
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
        name: "service",
        label: "Service",
        align: "left",
        field: "app_service",
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
        field: "app_doctor_name",
      },
      {
        name: "action",
        label: "Actions",
        align: "left",
        field: "action",
      },
    ];
    const accepted_columns = [
      {
        name: "patientName",
        label: "Patient Name",
        align: "left",
        field: "app_full_name",
      },
      {
        name: "service",
        label: "Service",
        align: "left",
        field: "app_service",
      },
      {
        name: "appointment",
        label: "Appointment",
        align: "left",
        field: "app_date",
      },
      {
        name: "doctorAssigned",
        label: "Doctor Assigned",
        align: "left",
        field: "app_doctor_name",
      },
      {
        name: "action",
        label: "Actions",
        align: "left",
        field: "action",
      },
    ];

    const rows = ref([]);

    //view appointment details if row clicked
    let bar = ref(false);
    const selectedAppointment = ref([]);
    const onRowClick = (evt, row, col) => {
      if (col.name === "action") {
        return;
      } else {
        bar.value = true;
        console.log(bar);
        selectedAppointment.value = row;
        console.log("Appointment", row);
      }
    };

    const handleAppointment = async (row, flag) => {
      //flag 0 pending, 1 accept, 2 reject
      const payload = {
        app_queue_num: row.app_queue_num,
        app_full_name: row.app_full_name,
        app_department: row.app_department,
        app_service: row.app_service,
        app_doctor_name: row.app_doctor_name,
        app_date: row.app_date,
        app_time: row.app_time,
        app_birth_date: row.app_birth_date,
        app_address: row.app_address,
        app_contact_num: row.app_contact_num,
        app_sex: row.app_sex,
        app_symptoms: row.app_symptoms,
        app_is_accepted: flag,
        app_reason: row.app_reason,
        app_patient: row.app_patient,
      };
      const response = await UpdateItem("updateApp_forms", payload);
      console.log(response);
      getAppointment();
    };

    const getAppointment = async () => {
      const response = await FetchItems("app_forms");
      rows.value = response.data;

      console.log("rows", rows);
    };

    //categorize
    const acceptedAppointments = computed(() => {
      return rows.value.filter((row) => row.app_is_accepted === 1);
    });

    const pendingAppointments = computed(() => {
      return rows.value.filter((row) => row.app_is_accepted === 0);
    });

    const rejectedAppointments = computed(() => {
      return rows.value.filter((row) => row.app_is_accepted === 2);
    });

    onMounted(async () => {
      await getAppointment();
    });

    return {
      pending_columns,
      rows,
      filterPending: ref(""),
      filterAccepted: ref(""),
      filterRejected: ref(""),
      acceptedAppointments,
      pendingAppointments,
      rejectedAppointments,
      bar,
      selectedAppointment,
      accepted_columns,

      handleAppointment,
      onRowClick,
    };
  },
};
