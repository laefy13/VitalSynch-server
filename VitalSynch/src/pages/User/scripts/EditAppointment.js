import { ref, onMounted } from "vue";
import { httpPost, httpGet } from "boot/axios";
import { FetchItem } from "src/pages/composables";
import { useRoute } from "vue-router";

export default {
  setup() {
    const nameOfPatient = ref(""); //
    const address = ref(""); //
    const contactNumber = ref(""); //
    const sex = ref(""); //
    const date = ref("");
    const service = ref("");
    const department = ref("");
    const symptoms = ref("");
    const appDate = ref("");
    const appTime = ref("");
    const doctor = ref("");
    const step1ref0 = ref(null);
    const step1ref2 = ref(null);
    const step1ref1 = ref(null);
    const step1ref3 = ref(null);
    const step1ref4 = ref(null);
    const step2ref0 = ref(null);
    const step2ref2 = ref(null);
    const step2ref1 = ref(null);
    const step3ref0 = ref(null);
    const step3ref2 = ref(null);
    const step3ref1 = ref(null);
    const step = ref(1);
    const stepper = ref(null);
    const onContinueStep = async () => {
      switch (step.value) {
        case 1:
          step1ref0.value.validate();
          step1ref1.value.validate();
          step1ref2.value.validate();
          step1ref3.value.validate();
          step1ref4.value.validate();
          if (
            !step1ref0.value.hasError &&
            !step1ref1.value.hasError &&
            !step1ref2.value.hasError &&
            !step1ref3.value.hasError &&
            !step1ref4.value.hasError
          ) {
            step.value = 2;
          }
          break;
        case 2:
          step2ref0.value.validate();
          step2ref1.value.validate();
          if (!step2ref0.value.hasError && !step2ref1.value.hasError) {
            step.value = 3;
          }

        case 3:
          step3ref0.value.validate();
          step3ref1.value.validate();
          step3ref2.value.validate();
          if (
            !step3ref0.value.hasError &&
            !step3ref1.value.hasError &&
            !step3ref2.value.hasError
          ) {
            step.value = 4;
            handleAddAppoitnment();
          }
      }
    };
    const handleAddAppoitnment = () => {
      const payload = {
        app_full_name: nameOfPatient.value,
        app_address: address.value,
        app_contact_num: contactNumber.value,
        app_sex: sex.value,
        app_birth_date: date.value,
        app_service: service.value,
        app_department: department.value,
        app_symptoms: symptoms.value,
        app_date: appDate.value,
        app_time: appTime.value,
        app_doctor_name: doctor.value,
        app_patient_id: localStorage.getItem("user_id"),
        app_is_accepted: 0,
      };
      httpPut("/app_form", payload, {
        success: (response) => {
          console.log(response.data);
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
    };
    //autofill in profile
    const route = useRoute();
    //Get appointment ID using router

    const getAppointment = async () => {
      console.log("app id", route.params.id);
      try {
        const response = await FetchItem(
          "app_form",
          localStorage.getItem("user_id")
        );

        const appData = response.data;

        // Autofill the details
        nameOfPatient.value = appData.app_full_name;
        address.value = appData.app_address;
        contactNumber.value = appData.app_contact_num;
        sex.value = appData.app_sex;
        date.value = appData.app_birth_date;
        service.value = appData.app_service;
        department.value = appData.app_department;
        symptoms.value = appData.app_symptoms;
        appDate.value = appData.app_date;
        appTime.value = appData.app_time;
        doctor.value = appData.app_doctor_name;
        app_patient_id.value = appData.app_patient_id;
        app_is_accepted.value = 0;
      } catch (error) {
        console.error("Error fetching app data:", error);
      }
    };
    onMounted(async () => {
      console.log("here");
      await getAppointment();
    });
    return {
      step,
      nameOfPatient,
      address,
      contactNumber,
      sex,
      date,
      service,
      department,
      symptoms,
      appDate,
      appTime,
      doctor,
      step1ref0,
      step1ref1,
      step1ref2,
      step1ref3,
      step1ref4,
      step2ref0,
      step2ref1,
      step2ref2,
      step3ref0,
      step3ref1,
      step3ref2,
      onContinueStep,
    };
  },
};
