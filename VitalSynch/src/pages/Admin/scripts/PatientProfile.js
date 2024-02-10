import { FetchItems, FetchItem } from "src/pages/composables";
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useQuasar } from "quasar";
import { httpPost,httpPut, httpGet } from "boot/axios";

export default {
  setup() {
    const $q = useQuasar();

    function checkFileSize(files) {
      return files.filter((file) => file.size < 400048);
    }

    function onRejected(rejectedEntries) {
      $q.notify({
        type: "negative",
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`,
      });
    }
    function uploadFiles(file){ 
      cconsole.log(file);
      // })
   }
    function beforeLabResultUpload(file) {
      const formData = new FormData();

      // Append the binary file data with a key 'file'
      formData.append('file', file);
  
      // Append additional data as fields in the FormData
      formData.append('lf_url', 'image');
      formData.append('lf_ptnt_id', '1');
  
      // Set the FormData as the data for the file
      file.data = formData;
  
      return true; // Proceed with the upload
    }
    function handlePrescriptionUpload(files) {
      // Assuming each file object has a `name` property
      const uploadedPrescriptionDocs = files.map(file => file.name);
      console.log(uploadedPrescriptionDocs);
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
    const columns2 = [
      {
        name: "medhis_record_date",
        label: "Record Date",
        align: "left",
        field: "medhis_record_date",
      },
      {
        name: "medhis_record_time",
        label: "Record Time",
        align: "left",
        field: "medhis_record_time",
      },
      {
        name: "medhis_height",
        label: "Height (cm)",
        align: "left",
        field: "medhis_height",
      },
      {
        name: "medhis_weight",
        label: "Weight (kg)",
        align: "left",
        field: "medhis_weight",
      },
      {
        name: "medhis_blood_pressure",
        label: "Blood Pressure",
        align: "left",
        field: "medhis_blood_pressure",
      },
      {
        name: "medhis_glucose",
        label: "Glucose Level",
        align: "left",
        field: "medhis_glucose",
      },
      {
        name: "medhis_illness",
        label: "Illness",
        align: "left",
        field: "medhis_illness",
      },
    ];
    const medicalHistoryRecords = ref([]);
    const fetchMedicalHistoryRecords = async () => {
      try {
        const response = await FetchItem("med_his", route.params.id);
        medicalHistoryRecords.value = response.data;
      } catch (error) {
        console.error("API Error:", error);
        // Handle error, e.g., show an error message to the user
      }
    };

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

    function labRepUploadUrl() {
      return `https://vitalsynch-924e9f1085c2.herokuapp.com/api/lab_repUpload/${id}`;
    }
    function prescriptionUploadUrl() {
      return `https://vitalsynch-924e9f1085c2.herokuapp.com/api/prescriptionUpload/${id}`;
    }
    // Use dummy data for testing
    // Comment out this block when you have the actual API to fetch data from
    onMounted(async () => {
      await getAppointment();
      await getPatientProfile();
      await fetchMedicalHistoryRecords();
    });

    return {
      columns,
      columns2,
      rows,
      filter: ref(""),
      filter2: ref(""),
      ptnt_appointments,
      patient,
      medicalHistoryRecords,
      fetchMedicalHistoryRecords,
      checkFileSize,
      onRejected,
      beforeLabResultUpload,
      handlePrescriptionUpload,
      uploadFiles,
      id,
      labRepUploadUrl,

      prescriptionUploadUrl
    };
  },
};
