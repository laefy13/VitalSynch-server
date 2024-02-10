import {
  FetchItem,
  UpdateItem,
  AddItem,
  UpdateProf,
} from "src/pages/composables/index.js";
import { ref, onMounted } from "vue";

export default {
  setup() {
    // User Form
    const userForm = ref({});

    // Guardian Form
    const guardianForm = ref({});

    const sexOptions = ref(["Male", "Female", "Other"]);
    const bloodGroupOptions = ref(["A", "B", "AB", "O"]);
    const maritalStatusOptions = ref([
      "Single",
      "Married",
      "Divorced",
      "Widowed",
    ]);

    //Update User Info
    const submitUserForm = async () => {
      console.log("User Form Data:", userForm);
      try {
        const response = await UpdateProf(
          "updatePtnt_prof",
          userForm.value.ptnt_id,
          userForm
        );
      } catch (error) {
        console.error("Error updating patient profile:", error);
      }
    };

    //Update Guardian Info
    const submitGuardianForm = () => {
      console.log("Guardian Form Data:", guardianForm);
      if (userForm.value.ptnt_grdn_id == null) {
        AddGuardianProfile();
      } else {
        try {
          const response = UpdateProf("updateGrdn_prof", guardianForm);
        } catch (error) {
          console.error("Error updating guardian profile:", error);
        }
      }
    };

    //Neew Guardian Prof if doesnt exist
    const AddGuardianProfile = async () => {
      if (userForm.value.ptnt_grdn_id == null) {
        guardianForm.value.grdn_id = "GRDN-" + userForm.value.ptnt_id; //assign grdn ID
        //NO EXISTING GUARDIAN PROF SO ADD
        try {
          const response = await AddItem("grdn_prof", guardianForm);
          console.log("Successfully added guardian profile", response.data);

          //Make sure to update the ptnt_grdn_id if u added grdn prof
          userForm.value.ptnt_grdn_id = guardianForm.value.grdn_id;
          submitUserForm();
        } catch (error) {
          console.error("Error adding guardian profile:", error);
        }
      }
    };

    //autofill existing user profile data
    const getPatientProfile = async () => {
      try {
        const response = await FetchItem(
          "ptnt_prof",
          localStorage.getItem("user_id")
        );
        userForm.value = response.data;
        //Get GuardianID if any
        if (userForm.value.ptnt_grdn_id != null) {
          getGuardianProfile(userForm.value.ptnt_grdn_id);
        }
      } catch (error) {
        console.error("Error fetching patient profile:", error);
      }
    };

    // Get Guardian Profile for autofill
    const getGuardianProfile = async () => {
      try {
        const response = await FetchItem(
          "grdn_profile",
          userForm.value.ptnt_grdn_id
        );
        guardianForm.value = response.data;
      } catch (error) {
        console.error("Error fetching guardian profile:", error);
      }
    };

    onMounted(() => {
      console.log("here");
      getPatientProfile();
    });
    return {
      userForm,
      sexOptions,
      bloodGroupOptions,
      maritalStatusOptions,
      submitUserForm,
      guardianForm,
      getGuardianProfile,
      submitGuardianForm,
      AddGuardianProfile,
    };
  },
};
