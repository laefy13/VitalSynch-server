<template>
  <q-page animated>
    <div class="flex justifty-start items-center q-mt-lg q-mb-lg gt-xs">
      <q-btn
        @click="$router.go(-1)"
        round
        dense
        flat
        icon="arrow_back"
        class=""
      />
      <h5 class="text-26 text-bold q-my-none q-ml-md">Update User Profile</h5>
    </div>
    <div class="row">
      <!-- User Information Card -->
      <q-card class="q-ma-xl col">
        <q-card-section class="q-pa-md">
          <q-form @submit="submitUserForm" class="text-center">
            <h6 class="text-bold">User Information</h6>

            <q-input
              v-model="userForm.ptnt_first_name"
              label="First Name"
              filled
              outlined
              :rules="[
                (val) => !!val || 'First Name is required',
                (val) =>
                  /^[a-zA-Z]+$/.test(val) ||
                  'Only letters are allowed in First Name',
              ]"
            />

            <q-input
              v-model="userForm.ptnt_surname"
              label="Surname"
              filled
              outlined
              :rules="[
                (val) => !!val || 'Surname is required',
                (val) =>
                  /^[a-zA-Z]+$/.test(val) ||
                  'Only letters are allowed in Surname',
              ]"
            />

            <q-input
              v-model="userForm.ptnt_mid_name"
              label="Middle Name"
              filled
              outlined
              :rules="[
                (val) =>
                  /^[a-zA-Z]*$/.test(val) ||
                  'Only letters are allowed in Middle Name',
              ]"
            />

            <q-input
              v-model="userForm.ptnt_extn_name"
              label="Extension Name"
              filled
              outlined
              :rules="[
                (val) =>
                  /^[a-zA-Z]*$/.test(val) ||
                  'Only letters are allowed in Extension Name',
              ]"
            />

            <q-input
              v-model="userForm.ptnt_allergies"
              label="Allergies"
              filled
              outlined
              class="q-mb-md"
            />

            <q-select
              v-model="userForm.ptnt_sex"
              label="Sex"
              :options="sexOptions"
              filled
              outlined
              :rules="[(val) => !!val || 'Sex is required']"
            />

            <q-input
              filled
              v-model="userForm.ptnt_birth_date"
              mask="date"
              :rules="['date']"
            >
              <template v-slot:append>
                <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy
                    cover
                    transition-show="scale"
                    transition-hide="scale"
                  >
                    <q-date v-model="userForm.ptnt_birth_date">
                      <div class="row items-center justify-end">
                        <q-btn
                          v-close-popup
                          label="Close"
                          color="primary"
                          flat
                        />
                      </div>
                    </q-date>
                  </q-popup-proxy>
                </q-icon>
              </template>
            </q-input>

            <q-select
              v-model="userForm.ptnt_blood_group"
              label="Blood Group"
              :options="bloodGroupOptions"
              filled
              outlined
              :rules="[(val) => !!val || 'Blood Group is required']"
            />

            <q-select
              v-model="userForm.ptnt_marital_status"
              label="Marital Status"
              :options="maritalStatusOptions"
              filled
              outlined
              :rules="[(val) => !!val || 'Marital Status is required']"
            />

            <q-input
              v-model="userForm.ptnt_contact_number"
              label="Contact Number"
              filled
              outlined
              :rules="[
                (val) => !!val || 'Contact Number is required',
                (val) =>
                  /^\d+$/.test(val) ||
                  'Only numbers are allowed in Contact Number',
              ]"
              :clearable="true"
            />

            <q-input
              v-model="userForm.ptnt_address"
              label="Address"
              filled
              outlined
              :rules="[(val) => !!val || 'Address is required']"
            />

            <q-card-actions align="right">
              <q-btn type="submit" color="primary" label="Submit User Form" />
            </q-card-actions>
          </q-form>
        </q-card-section>
      </q-card>

      <!-- Guardian Information Card -->
      <q-card class="q-ma-xl col">
        <q-card-section class="q-pa-md">
          <q-form @submit="submitGuardianForm" class="text-center">
            <h6 class="text-bold">Guardian Information</h6>

            <q-input
              v-model="guardianForm.grdn_first_name"
              label="First Name"
              filled
              outlined
              :rules="[
                (val) => !!val || 'First Name is required',
                (val) =>
                  /^[a-zA-Z]+$/.test(val) ||
                  'Only letters are allowed in First Name',
              ]"
            />

            <q-input
              v-model="guardianForm.grdn_surname"
              label="Surname"
              filled
              outlined
              :rules="[
                (val) => !!val || 'Surname is required',
                (val) =>
                  /^[a-zA-Z]+$/.test(val) ||
                  'Only letters are allowed in Surname',
              ]"
            />

            <q-input
              v-model="guardianForm.grdn_mid_name"
              label="Middle Name"
              filled
              outlined
              :rules="[
                (val) =>
                  /^[a-zA-Z]*$/.test(val) ||
                  'Only letters are allowed in Middle Name',
              ]"
            />

            <q-input
              v-model="guardianForm.grdn_extn_name"
              label="Extension Name"
              filled
              outlined
              :rules="[
                (val) =>
                  /^[a-zA-Z]*$/.test(val) ||
                  'Only letters are allowed in Extension Name',
              ]"
            />

            <q-input
              v-model="guardianForm.grdn_allergies"
              label="Allergies"
              filled
              outlined
              class="q-mb-md"
            />

            <q-select
              v-model="guardianForm.grdn_sex"
              label="Sex"
              :options="sexOptions"
              filled
              outlined
              :rules="[(val) => !!val || 'Sex is required']"
            />

            <q-input
              filled
              v-model="guardianForm.grdn_birth_date"
              mask="date"
              :rules="['date']"
            >
              <template v-slot:append>
                <q-icon name="event" class="cursor-pointer">
                  <q-popup-proxy
                    cover
                    transition-show="scale"
                    transition-hide="scale"
                  >
                    <q-date v-model="guardianForm.grdn_birth_date">
                      <div class="row items-center justify-end">
                        <q-btn
                          v-close-popup
                          label="Close"
                          color="primary"
                          flat
                        />
                      </div>
                    </q-date>
                  </q-popup-proxy>
                </q-icon>
              </template>
            </q-input>

            <q-select
              v-model="guardianForm.grdn_blood_group"
              label="Blood Group"
              :options="bloodGroupOptions"
              filled
              outlined
              :rules="[(val) => !!val || 'Blood Group is required']"
            />

            <q-select
              v-model="guardianForm.grdn_marital_status"
              label="Marital Status"
              :options="maritalStatusOptions"
              filled
              outlined
              :rules="[(val) => !!val || 'Marital Status is required']"
            />

            <q-input
              v-model="guardianForm.grdn_contact_number"
              label="Contact Number"
              filled
              outlined
              :rules="[
                (val) => !!val || 'Contact Number is required',
                (val) =>
                  /^\d+$/.test(val) ||
                  'Only numbers are allowed in Contact Number',
              ]"
              :clearable="true"
            />

            <q-input
              v-model="guardianForm.grdn_address"
              label="Address"
              filled
              outlined
              :rules="[(val) => !!val || 'Address is required']"
            />

            <q-card-actions align="right">
              <q-btn
                type="submit"
                color="primary"
                label="Submit Guardian Form"
              />
            </q-card-actions>
          </q-form>
        </q-card-section>
      </q-card>
    </div>
  </q-page>
</template>

<script>
import { FetchItem, UpdateItem, AddItem, UpdateProf } from "../composables";
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
</script>
