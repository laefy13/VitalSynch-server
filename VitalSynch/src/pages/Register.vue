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
            <q-btn no-caps class="btn q-mb-md">
              <q-icon name="account_circle" color="black"></q-icon>I am a
              patient</q-btn
            >
            <q-btn no-caps class="btn">
              <q-icon name="health_and_safety" color="black"></q-icon>I am a
              doctor</q-btn
            >
            <q-radio> I accept terms of use and privacy policy. </q-radio>
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
              <q-input outlined class="q-ma-none"></q-input>
            </div>
            <div class="column q-ma-none">
              <p class="input-title">Surname</p>
              <q-input outlined class="q-ma-none"> </q-input>
            </div>
          </div>
          <div class="row">
            <div class="column q-mr-md">
              <p class="input-title">Date of birth</p>
              <q-input outlined class="q-ma-none"></q-input>
            </div>

            <div class="column q-ma-none">
              <p class="input-title">Sex</p>
              <q-input outlined class="q-ma-none"> </q-input>
            </div>
          </div>
          <p class="input-title">Address</p>
          <q-input class="q-mt-sm" outlined></q-input>
          <p class="input-title">Contact number</p>
          <q-input class="q-mt-sm" outlined></q-input>
        </q-step>

        <q-step :name="3" title="Enter login credentials" icon="person">
          <h6>Fill in account details</h6>
          <div>
            <p class="input-title">Username</p>
            <q-input
              class="q-mt-sm"
              outlined
              placeholder="Enter Username"
            ></q-input>
            <p class="input-title">Email</p>
            <q-input
              class="q-mt-sm"
              outlined
              placeholder="Enter Email"
            ></q-input>
            <p class="input-title">Password</p>
            <q-input
              class="q-mt-sm"
              placeholder="Enter Password"
              outlined
            ></q-input>
            <p class="input-title">Confirm Password</p>
            <q-input
              class="q-mt-sm"
              outlined
              placeholder="Re-enter Password"
            ></q-input>
          </div>
        </q-step>
        <q-step
          :name="4"
          title="You are now registered!"
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
          <q-stepper-navigation>
            <q-btn
              v-if="step > 1"
              color="black"
              @click="$refs.stepper.previous()"
              label="Back"
              class="q-mr-md q-px-lg q-py-md text-black"
              outline
              rounded
              no-caps
            />
            <q-btn
              @click="$refs.stepper.next()"
              color="primary"
              :label="step === 3 ? 'Finish' : 'Next Step'"
              class="q-px-xl q-py-md text-black"
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
import { ref } from "vue";

export default {
  setup() {
    return {
      step: ref(1),
    };
  },
};
</script>
<style lang="scss" src="./styles/Register.scss"></style>
