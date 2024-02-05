import { FetchItems } from "src/pages/composables";
import { ref, onMounted } from "vue";

export default {
  setup() {
    const columns = [
      {
        name: "patientName",
        label: "Patient Name",
        align: "left",
        field: "patientName",
      },
      {
        name: "department",
        label: "Department",
        align: "left",
        field: "department",
      },
      { name: "status", label: "Status", align: "left", field: "status" },
      {
        name: "doctor",
        label: "Doctor",
        align: "left",
        field: "assignedDoctor",
      },
      {
        name: "appointment",
        label: "Appointment",
        align: "left",
        field: (row) => `${row.time}, ${row.date}`,
      },
      { name: "options", label: "Options", align: "left", field: "options" },
    ];

    const rows = ref([]);

    const patients = ref([]);
    const doctors = ref([]);

    const getPatients = async () => {
      let response = await FetchItems("patients");
      patients.value = response.data;
    };

    const getDoctors = async () => {
      let response = await FetchItems("doctors");
      doctors.value = response.data;
    };

    const getAppointment = async () => {
      await Promise.all([getPatients(), getDoctors()]); // Fetch patients and doctors concurrently
      let response = await FetchItems("appointments");

      rows.value = response.data.map((appointment) => {
        const patient = patients.value.find(
          (p) => p.id === appointment.patientId
        );
        const doctor = doctors.value.find(
          (d) => d.doctorName === appointment.assignedDoctor
        );

        return {
          ...appointment,
          patientName: patient ? patient.patientName : "Unknown",
          department: patient ? patient.department : "Unknown",
          status: patient ? patient.status : "Unknown",
          doctor: doctor ? doctor.doctorName : "Unknown",
        };
      });

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
    };
  },
};
