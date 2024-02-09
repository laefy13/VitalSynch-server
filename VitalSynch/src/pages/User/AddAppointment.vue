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
                  <q-input
                    outlined
                    class="q-ma-none input-field"
                    ref="step1ref0"
                    v-model="nameOfPatient"
                    :rules="[
                      (val) => !!val || 'Name of Patient is required',
                      (val) =>
                        /^[a-zA-Z\s]+$/.test(val) ||
                        'Invalid characters in Name of Patient',
                    ]"
                  ></q-input>
                </div>

                <div class="column q-ma-none"></div>
              </div>
              <q-separator />
              <div class="row q-mt-sm">
                <div class="column q-mr-md">
                  <p class="input-title">Date of Birth</p>
                  <q-input
                    outlined
                    class="q-ma-none"
                    ref="step1ref1"
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
                      </q-icon> </template
                  ></q-input>
                </div>

                <div class="column q-ma-none">
                  <p class="input-title">Sex</p>
                  <q-select
                    outlined
                    class="q-ma-none input-field-half"
                    ref="step1ref2"
                    v-model="sex"
                    :options="['Female', 'Male']"
                    label="Select Sex"
                    :rules="[(val) => !!val || 'Sex is required']"
                  >
                  </q-select>
                </div>
              </div>
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Contact number</p>
                  <q-input
                    class="q-mt-sm"
                    ref="step1ref3"
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
                </div>
                <div class="column">
                  <p class="input-title">Home Address</p>
                  <q-input
                    class="q-mt-sm input-field"
                    ref="step1ref4"
                    outlined
                    v-model="address"
                    :rules="[(val) => !!val || 'Address is required']"
                  ></q-input>
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
                    ref="step2ref0"
                    outlined
                    class="q-ma-none input-field"
                    v-model="service"
                    :options="[
                      'Consultation',
                      'Folow-up',
                      'Check-up',
                      'Treatment',
                      'Lab Test',
                    ]"
                    label="Select Service"
                    :rules="[(val) => !!val || 'Service is required']"
                  ></q-select>
                </div>

                <div class="column q-ma-none"></div>
              </div>
              <q-separator />
              <div class="row q-mt-sm">
                <div class="column q-mr-md">
                  <p class="input-title">Select Department</p>
                  <q-select
                    ref="step2ref1"
                    outlined
                    class="q-ma-none input-field"
                    v-model="department"
                    :options="[
                      'Cardiology',
                      'Orthopedics',
                      'Radiology',
                      'General Medicine',
                      'Neurology',
                      // Add more departments as needed
                    ]"
                    label="Select a department"
                    :rules="[(val) => !!val || 'Department is required']"
                  ></q-select>
                </div>
              </div>
              <div class="row">
                <div class="column">
                  <p class="input-title">Experience Symptoms (if any)</p>
                  <q-input
                    class="q-mt-sm paragraph"
                    outlined
                    v-model="symptoms"
                    ref="step2ref2"
                  ></q-input>
                </div>
              </div>
            </q-step>

            <q-step :name="3" title="Profile" icon="sym_o_info" prefix="3">
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Preffered date</p>
                  <q-input
                    outlined
                    class="q-ma-none"
                    ref="step3ref0"
                    v-model="appDate"
                    mask="date"
                    :rules="['date']"
                    ><template v-slot:append>
                      <q-icon name="event" class="cursor-pointer">
                        <q-popup-proxy
                          cover
                          transition-show="scale"
                          transition-hide="scale"
                        >
                          <q-date v-model="appDate">
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
                      </q-icon> </template
                  ></q-input>
                </div>
                <div class="column q-ma-none">
                  <p class="input-title">Preffered Time</p>
                  <q-input
                    outlined
                    class="q-ma-none"
                    ref="step3ref1"
                    mask="time"
                    :rules="['time']"
                    v-model="appTime"
                  >
                    <template v-slot:append>
                      <q-icon name="schedule" class="cursor-pointer">
                        <q-popup-proxy
                          cover
                          transition-show="scale"
                          transition-hide="scale"
                        >
                          <q-time v-model="appTime" />
                        </q-popup-proxy>
                      </q-icon> </template
                  ></q-input>
                </div>
              </div>
              <div class="row">
                <div class="column q-mr-md">
                  <p class="input-title">Doctor</p>
                  <q-select
                    ref="step3ref2"
                    v-model="doctor"
                    borderless
                    outlined
                    label="Select Doctor"
                    class="q-ma-none input-field"
                    :options="['Dr. ahduf', 'Dr. hnusjadbfjb']"
                    :rules="[(val) => !!val || 'Doctor is required']"
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
                  @click="onContinueStep"
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
<script src="./scripts/AddAppointment.js"></script>
