import { FetchItem } from "src/pages/composables";
import { ref, onMounted } from "vue";

export default {
  setup() {
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
        const response = await FetchItem(
          "med_his",
          localStorage.getItem("user_id")
        );
        medicalHistoryRecords.value = response.data;
      } catch (error) {
        console.error("API Error:", error);
        // Handle error, e.g., show an error message to the user
      }
    };

    onMounted(async () => {
      await fetchMedicalHistoryRecords();
    });

    return {
      columns2,
      filter: ref(""),
      medicalHistoryRecords,
      fetchMedicalHistoryRecords,
    };
  },
};
