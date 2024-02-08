<template>
  <div class="container row register">
    <div class="column col flex items-center">
      <div class="q-mt-lg">
        <img src="src\assets\VitalSynch_logo_v1 2.png" />
      </div>
      <h2 class="text-bold q-my-md">VITAL SYNC</h2>
      <q-stepper
        v-model="step"
        flat
        ref="stepper"
        alternative-labels
        color="primary"
        animated
        :contracted="$q.screen.lt.md"
        active-color="black"
        style="height: 100px"
        class="my-custom-paddding"
      >
        <q-step
          :name="1"
          title="Choose your account Type"
          icon="sym_o_settings"
          :done="step > 1"
        >
          <h5 class="text-weight-bolder q-mt-xl">Choose Account Type</h5>
          <div class="column items-center">
            <q-btn
              no-caps
              :class="[
                'account-btn',
                'q-mb-md',
                'long-btn',
                {
                  'shadow-5 bg-black text-white': account_type === 1,
                  'no-shadow': account_type === 0,
                },
              ]"
              @click="handleAccountType(1)"
            >
              <q-icon name="account_circle"></q-icon>I am a patient</q-btn
            >
            <q-btn
              no-caps
              :class="[
                'account-btn',
                'q-mb-md',
                'long-btn',
                {
                  '': account_type === 1,
                  'shadow-5 bg-black text-white': account_type === 0,
                },
              ]"
              @click="handleAccountType(0)"
            >
              <q-icon name="health_and_safety"></q-icon>I am a doctor</q-btn
            >
            <q-toggle v-model="acceptterms">
              I accept terms of use and privacy policy.
            </q-toggle>
          </div>
        </q-step>

        <q-step
          :name="2"
          title="Enter contact details"
          icon="sym_o_info"
          :done="step > 2"
        >
          <h6 class="text-bold q-mt-md">Fill in contact details</h6>
          <div class="row">
            <div class="column q-mr-md">
              <p class="input-title">First Name</p>
              <q-input
                ref="step2ref0"
                outlined
                class="q-ma-none input-field-half"
                v-model="firstName"
                :rules="[
                  (val) => !!val || 'First Name is required',
                  (val) =>
                    /^[a-zA-Z]+$/.test(val) ||
                    'Invalid characters in First Name',
                ]"
              ></q-input>
            </div>
            <div class="column q-ma-none">
              <p class="input-title">Surname</p>
              <q-input
                ref="step2ref1"
                outlined
                class="q-ma-none input-field-half"
                v-model="surname"
                :rules="[
                  (val) => !!val || 'Surname is required',
                  (val) =>
                    /^[a-zA-Z]+$/.test(val) || 'Invalid characters in Surname',
                ]"
              ></q-input>
            </div>
          </div>
          <div class="row">
            <div class="column q-mr-md">
              <p class="input-title">Date of birth</p>
              <q-input
                class="input-field-half"
                ref="step2ref2"
                outlined
                v-model="date"
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
                      <q-date v-model="date">
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
            </div>
            <div class="column q-ma-none">
              <p class="input-title">Sex</p>
              <q-select
                ref="step2ref3"
                v-model="sex"
                :options="['Female', 'Male']"
                label="Select Sex"
                outlined
                :rules="[(val) => !!val || 'Sex is required']"
                class="input-field-half"
              ></q-select>
            </div>
          </div>
          <p class="input-title">Address</p>
          <q-input
            class="q-mt-sm input-field"
            ref="step2ref4"
            outlined
            v-model="address"
            :rules="[(val) => !!val || 'Address is required']"
          ></q-input>
          <p class="input-title">Contact number</p>
          <q-input
            class="q-mt-sm input-field"
            ref="step2ref5"
            outlined
            v-model="contactNumber"
            :rules="[
              (val) => !!val || 'Contact number is required',
              (val) => /^[0-9]+$/.test(val) || 'Invalid contact number',
              (val) =>
                (val && val.length >= 9) ||
                'Contact number must be at least 9 numbers',
            ]"
          ></q-input>
        </q-step>

        <q-step
          :name="3"
          title="Enter login credentials"
          icon="person"
          :done="step > 3"
        >
          <h6>Fill in account details</h6>
          <div>
            <p class="input-title">Username</p>
            <q-input
              ref="step3ref0"
              class="q-mt-sm input-field"
              outlined
              placeholder="Enter Username"
              v-model="username"
              :rules="[
                (val) => !!val || 'Username is required',
                (val) =>
                  /^[a-zA-Z0-9]+$/.test(val) ||
                  'Username must contain only letters and numbers',
              ]"
            ></q-input>
            <p class="input-title input-field">Email</p>
            <q-input
              ref="step3ref1"
              class="q-mt-sm input-field"
              outlined
              placeholder="Enter Email"
              v-model="email"
              :rules="[
                (val) => !!val || 'Email is required',
                (val) => /^\S+@\S+\.\S+$/.test(val) || 'Invalid email format',
              ]"
            ></q-input>
            <p class="input-title">Password</p>
            <q-input
              ref="step3ref2"
              class="q-mt-sm input-field"
              placeholder="Enter Password"
              outlined
              type="password"
              v-model="password"
              :rules="[
                (val) => !!val || 'Password is required',
                (val) =>
                  /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(val) ||
                  'Password must have at least one uppercase letter, one lowercase letter, and be at least 8 characters',
              ]"
            ></q-input>
            <p class="input-title">Confirm Password</p>
            <q-input
              ref="step3ref3"
              class="q-mt-sm input-field"
              outlined
              placeholder="Re-enter Password"
              type="password"
              v-model="confirmPassword"
              :rules="[
                (val) => !!val || 'Confirm Password is required',
                (val) => val === password || 'Passwords do not match',
              ]"
            ></q-input>
          </div>
        </q-step>
        <q-step
          :name="4"
          title="You are now registered!"
          class="material-icons-outlined"
          icon="library_add_check"
        >
          <div class="text-center">
            <q-icon size="50px" name="sym_o_check_circle"></q-icon>
            <h5 class="q-my-md">All done!</h5>
            <p class="box">
              Your account has been created. You can now log in and access your
              health records, appointment scheduling, and personalized
              healthcare services.
            </p>
          </div>
        </q-step>

        <template v-slot:navigation>
          <q-stepper-navigation class="items-center text-center">
            <q-btn
              v-if="step > 1 && step < 4"
              color="black"
              @click="$refs.stepper.previous()"
              label="Back"
              class="q-mr-md short-btn text-black"
              outline
              rounded
              no-caps
            />
            <q-btn
              v-if="step < 4"
              @click="onContinueStep"
              color="primary"
              :label="step === 3 ? 'Finish' : 'Next Step'"
              class="long-btn text-black"
              rounded
              no-caps
              :disable="!acceptterms || account_type == null"
            />
            <q-btn
              v-if="step == 4"
              @click="$router.push({ name: 'login' })"
              color="primary"
              label="Login"
              class="text-black text-center long-btn"
              rounded
              no-caps
            />
          </q-stepper-navigation>
        </template>
      </q-stepper>
    </div>

    <div class="col">
      <img src="src\assets\login-bg.png" class="bg" />
    </div>
  </div>
</template>

<script>
import { ref, watch } from "vue";
import { httpPost } from "src/boot/axios";
export default {
  setup() {
    const step = ref(1);
    const acceptterms = ref(false);
    const firstName = ref("");
    const surname = ref("");
    const address = ref("");
    const contactNumber = ref("");
    const username = ref("");
    const email = ref("");
    const password = ref("");
    const confirmPassword = ref("");
    const sex = ref("");
    const date = ref("");
    const account_type = ref(null);
    const handleAccountType = (type) => {
      account_type.value = type;
      console.log("account:", account_type);
    };

    const step2ref0 = ref(null);
    const step2ref1 = ref(null);
    const step2ref3 = ref(null);
    const step2ref4 = ref(null);
    const step2ref5 = ref(null);
    const step2ref6 = ref(null);
    const step2ref2 = ref(null);
    const step3ref0 = ref(null);
    const step3ref1 = ref(null);
    const step3ref2 = ref(null);
    const step3ref3 = ref(null);
    const stepper = ref(null);
    watch(account_type, (newVal) => {
      console.log("account_type changed to:", newVal);
    });

    const onContinueStep = async () => {
      switch (step.value) {
        case 1:
          console.log("here", stepper);
          step.value = 2;
          break;
        case 2:
          step2ref0.value.validate();
          step2ref1.value.validate();
          step2ref2.value.validate();
          step2ref3.value.validate();
          step2ref4.value.validate();
          step2ref5.value.validate();
          if (
            !step2ref0.value.hasError &&
            !step2ref1.value.hasError &&
            !step2ref2.value.hasError &&
            !step2ref3.value.hasError &&
            !step2ref4.value.hasError &&
            !step2ref5.value.hasError
          ) {
            step.value = 3;
          }
          break;
        case 3:
          step3ref0.value.validate();
          step3ref1.value.validate();
          step3ref2.value.validate();
          step3ref3.value.validate();
          if (
            !step3ref0.value.hasError &&
            !step3ref1.value.hasError &&
            !step3ref2.value.hasError &&
            !step3ref3.value.hasError
          ) {
            step.value = 4;
            handleRegister();
          }
      }
    };

    function generatePatientId() {
      const prefix = "PTNT"; // Prefix for patient IDs
      const uniqueId = Date.now().toString(36); // Unique identifier (timestamp in base36)
      return `${prefix}-${uniqueId}`;
    }

    function generateDoctorId() {
      const prefix = "DR"; // Prefix for patient IDs
      const uniqueId = Date.now().toString(36); // Unique identifier (timestamp in base36)
      return `${prefix}-${uniqueId}`;
    }
    const handleRegister = () => {
      console.log("handling register");
      if (account_type.value == 0) {
        handleRegisterDoctor();
      } else if (account_type.value == 1) {
        handleRegisterPatient();
      }
    };
    const handleRegisterDoctor = () => {
      const doctorid = generateDoctorId();
      const payload = {
        doctor_id: doctorid,
        doctor_surname: surname.value,
        doctor_first_name: firstName.value,
        doctor_mid_name: "",
        doctor_extn_name: "",
        doctor_email: email.value,
        doctor_password: password.value,
        doctor_sex: sex.value,
        doctor_contact_number: contactNumber.value,
        doctor_address: address.value,
        doctor_position: "",
        doctor_department: "",
        doctor_signature: "",
      };

      httpPost("/doctor_prof", payload, {
        success: (response) => {
          console.log(response.data);
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
    };
    const handleRegisterPatient = async () => {
      const patientId = generatePatientId();
      const payload = {
        ptnt_id:patientId,
        ptnt_grdn_id:"",
        ptnt_email: email.value,
        ptnt_password: password.value,
        ptnt_surname: surname.value,
        ptnt_first_name: firstName.value,
        ptnt_mid_name: "",
        ptnt_extn_name: "",
        ptnt_sex: sex.value,
        ptnt_birth_date: date.value,
        ptnt_blood_group: "",
        ptnt_marital_status: "",
        ptnt_contact_number: contactNumber.value,
        ptnt_address: address.value,
      };

      console.log(payload,email.value);
      httpPost("/ptnt_prof", payload, {
        success: (response) => {
          console.log(response.data);
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
    };

    return {
      step,
      acceptterms,
      firstName,
      surname,
      address,
      contactNumber,
      username,
      email,
      password,
      confirmPassword,
      sex,
      date,
      account_type,
      step2ref0,
      step2ref1,
      step2ref2,
      step2ref3,
      step2ref4,
      step2ref5,
      step2ref6,
      step3ref0,
      step3ref1,
      step3ref2,
      step3ref3,
      handleAccountType,
      handleRegister,
      onContinueStep,
    };
  },
};
</script>

<style lang="scss" src="./styles/Register.scss"></style>
