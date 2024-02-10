import { FetchItems, AddItem } from "src/pages/composables";
import { ref, onMounted } from "vue";
import { useQuasar } from "quasar";

export default {
  setup() {
    const $q = useQuasar();
    const columns = [
      {
        name: "patientID",
        label: "Patient ID",
        align: "left",
        field: "ptnt_id",
      },
      {
        name: "patientName",
        label: "Patient Name",
        align: "left",
        field: "ptnt_first_name",
      },
      {
        name: "sex",
        label: "Sex",
        align: "left",
        field: "ptnt_sex",
      },
      {
        name: "birthdate",
        label: "Birth Date",
        align: "left",
        field: "ptnt_birth_date",
      },
      {
        name: "contactNumber",
        label: "Contact Number",
        align: "left",
        field: "ptnt_contact_number",
      },
      {
        name: "contactNumber",
        label: "Contact Number",
        align: "left",
        field: "ptnt_contact_number",
      },
      {
        name: "action",
        label: "Action",
        align: "left",
        field: "action",
      },
    ];
    const bar = ref(false);
    const medicalRecord = ref({
      medhis_height: null,
      medhis_weight: null,
      medhis_blood_pressure: null,
      medhis_glucose: null,
      medhis_illness: null,
    });
    const submitMedicalRecord = async () => {
      const payload = {
        medhis_ptnt_id: selectedPatient.value.ptnt_id,
        medhis_record_date: new Date().toISOString().split("T")[0], // Today's date
        medhis_record_time: new Date().toLocaleTimeString(), // Current time
        medhis_height: medicalRecord.value.medhis_height,
        medhis_weight: medicalRecord.value.medhis_weight,
        medhis_blood_pressure: medicalRecord.value.medhis_blood_pressure,
        medhis_glucose: medicalRecord.value.medhis_glucose,
        medhis_illness: medicalRecord.value.medhis_illness,
      };
      try {
        const response = await AddItem("med_his", payload);
        console.log("Added medical record", response.data);
        $q.notify({
          type: "positive",
          message: "Added Medical Record Successfully!",
        });
      } catch (error) {
        console.error("API Error:", error);
        $q.notify({
          type: "negative",
          message: "Adding Medical Record Unsuccesful.",
        });
      }
    };
    const selectedPatient = ref();
    const handleAddMedicalRecord = (row) => {
      bar.value = true;
      console.log(bar);
      selectedPatient.value = row;
      console.log("Appointment", row);
    };
    const rows = ref([]);

    const getPatients = async () => {
      let response = await FetchItems("ptnt_profs");
      rows.value = response.data;

      console.log("rows", rows);
    };

    onMounted(async () => {
      getPatients();
    });

    return {
      columns,
      rows,
      filter: ref(""),
      bar,
      medicalRecord,
      submitMedicalRecord,
      handleAddMedicalRecord,
    };
  },
};
