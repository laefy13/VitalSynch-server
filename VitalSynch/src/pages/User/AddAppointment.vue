<template>
  <div class="appointment">
    <div class="q-py-xl fit bg">
      <div class="flex justifty-start items-center q-mt- q-mb-lg gt-xs">
        <q-btn
          @click="$router.go(-1)"
          round
          dense
          flat
          icon="arrow_back"
          class=""
        />
        <h5 class="text-26 text-bold q-my-none q-ml-md">Appointment Center</h5>
      </div>
      <div class="column items-center">
        <q-card class="q-pa-md appointment-container justify-center" rounded>
          <h4 class="main-header text-center q-my-md">
            Medical Appointment Form
          </h4>
          <q-stepper
            v-model="step"
            ref="stepper"
            animated
            active-color="black"
            :contracted="$q.screen.lt.md"
            alternative-labels=""
            flat
            class="q-px-xl"
          >
            <q-step :name="1" title="Profile Information" prefix="1" class="">
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Name of Patient</p>
                  <q-input outlined class="q-ma-none input-field"></q-input>
                </div>

                <div class="column q-ma-none"></div>
              </div>
              <q-separator />
              <div class="row q-mt-sm">
                <div class="column q-mr-md">
                  <p class="input-title">Date of Birth</p>
                  <q-input outlined class="q-ma-none"></q-input>
                </div>

                <div class="column q-ma-none">
                  <p class="input-title">Sex</p>
                  <q-input outlined class="q-ma-none"> </q-input>
                </div>
              </div>
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Contact number</p>
                  <q-input class="q-mt-sm" outlined></q-input>
                </div>
                <div class="column">
                  <p class="input-title">Home Address</p>
                  <q-input class="q-mt-sm input-field" outlined></q-input>
                </div>
              </div>
            </q-step>
            <q-step
              :name="2"
              title="Reason for Appointment"
              icon="sym_o_info"
              prefix="2"
            >
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Service</p>
                  <q-select
                    outlined
                    class="q-ma-none input-field"
                    v-model="service"
                    :options="['Consultation', 'Folow-up Check-up', 'Lab Test']"
                    label="Select Service"
                  ></q-select>
                </div>

                <div class="column q-ma-none"></div>
              </div>
              <q-separator />
              <div class="row q-mt-sm">
                <div class="column q-mr-md">
                  <p class="input-title">Select Department</p>
                  <q-select
                    outlined
                    class="q-ma-none input-field"
                    v-model="department"
                    :options="[
                      'Cardiology',
                      'Orthopedics',
                      'Radiology',
                      'Emergency Medicine',
                      'Neurology',
                      // Add more departments as needed
                    ]"
                    label="Select a department"
                  ></q-select>
                </div>
              </div>
              <div class="row">
                <div class="column">
                  <p class="input-title">Experience Symptoms (if any)</p>
                  <q-input class="q-mt-sm paragraph" outlined></q-input>
                </div>
              </div>
            </q-step>

            <q-step :name="3" title="Profile" icon="sym_o_info" prefix="3">
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Preffered date</p>
                  <q-input outlined class="q-ma-none"></q-input>
                </div>
                <div class="column q-ma-none">
                  <p class="input-title">Preffered Time</p>
                  <q-input outlined class="q-ma-none"> </q-input>
                </div>
              </div>
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Doctor</p>
                  <q-select
                    borderless
                    outlined
                    label="Select Doctor"
                    class="q-ma-none input-field"
                    :options="['Dr. ahduf', 'Dr. hnusjadbfjb']"
                  ></q-select>
                </div>
              </div>
            </q-step>

            <q-step
              :name="4"
              title="Submitted!"
              class="material-icons-outlined"
              icon="library_add_check"
            >
              <div class="text-center">
                <q-icon size="50px" name="sym_o_check_circle"></q-icon>
                <h5 class="q-my-md">Appointment Request Submitted!</h5>
                <p class="box">
                  We will notify you when your appointment is confirmed.
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
                  @click="$refs.stepper.next()"
                  color="primary"
                  :label="step === 3 ? 'Finish' : 'Next Step'"
                  class="long-btn text-black"
                  rounded
                  no-caps
                />
                <q-btn
                  v-if="step == 4"
                  @click="$router.push({ name: 'appointment-center' })"
                  color="primary"
                  label="View Appointments"
                  class="text-black text-center long-btn"
                  rounded
                  no-caps
                />
              </q-stepper-navigation>
            </template>
          </q-stepper>
        </q-card>
      </div>
    </div>
  </div>
</template>
<style src="./styles/AddAppointment.scss"></style>
<script>
import { ref } from "vue";

export default {
  setup() {
    return {
      step: ref(1),
    };
  },
};
</script>
