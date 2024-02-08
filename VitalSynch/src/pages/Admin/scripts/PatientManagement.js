import { FetchItems } from "src/pages/composables";
import { ref, onMounted } from "vue";

export default {
  setup() {
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
        name: "action",
        label: "Action",
        align: "left",
        field: "action",
      },
    ];

    const rows = ref([]);

    const getPatients = async () => {
      let response = await FetchItems("ptnt_profs");
      rows.value = response.data;

      console.log("rows", rows);
    };

    // Use dummy data for testing
    // Comment out this block when you have the actual API to fetch data from
    onMounted(async () => {
      getPatients();
    });

    return {
      columns,
      rows,
      filter: ref(""),
    };
  },
};
