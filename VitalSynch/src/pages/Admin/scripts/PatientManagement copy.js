import { FetchItems } from "src/pages/composables";
import { ref, onMounted } from "vue";

export default {
  setup() {
    const columns = [
      {
        name: "patientName",
        label: "Patient Name",
        align: "left",
        field: "ptnt_first_name", // Update to match the database naming
      },
      {
        name: "department",
        label: "Department",
        align: "left",
        field: "ptnt_contact_number", // Update to match the database naming
      },
      {
        name: "status",
        label: "Status",
        align: "left",
        field: "ptnt_marital_status",
      }, // Update to match the database naming
      {
        name: "doctor",
        label: "Doctor",
        align: "left",
        field: "assignedDoctor", // Assuming "assignedDoctor" is a field in your database
      },
      {
        name: "appointment",
        label: "Appointment",
        align: "left",
        field: (row) => `${row.time}, ${row.date}`, // Update to match the database naming
      },
      { name: "options", label: "Options", align: "left", field: "options" }, // You might want to define the "options" field
    ];

    const rows = ref([]);

    const patients = ref([]);
    const doctors = ref([]);

    const getPatients = async () => {
      let response = await FetchItems("ptnt_prof");
      patients.value = response.data;
    };

    const getDoctors = async () => {
      let response = await FetchItems("doctor_prof");
      doctors.value = response.data;
    };

    const getAppointment = async () => {
      await Promise.all([getPatients(), getDoctors()]); // Fetch patients and doctors concurrently
      let response = await FetchItems("appointments");

      rows.value = response.data.map((appointment) => {
        const patient = patients.value.find(
          (p) => p.ptnt_id === appointment.patientId // Update to match the database naming
        );
        const doctor = doctors.value.find(
          (d) => d.doctorName === appointment.assignedDoctor
        );

        return {
          ...appointment,
          patientName: patient
            ? `${patient.ptnt_first_name} ${patient.ptnt_surname}`
            : "Unknown", // Assuming ptnt_surname is a field
          department: patient ? patient.ptnt_contact_number : "Unknown",
          status: patient ? patient.ptnt_marital_status : "Unknown",
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
