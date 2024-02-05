<template>
  <div class="container row login">
    <div class="column col flex items-center">
      <div class="q-mt-lg">
        <img src="src\assets\VitalSynch_logo_v1 2.png" />
      </div>
      <h2 class="text-bold q-my-md">VITAL SYNC</h2>
      <h5 class="text-weight-bolder q-mt-xl">Choose Account Type</h5>
      <div class="q-gutter-md row">
        <q-card class="rounded-square-outline col">
          <div class="q-card-section q-pa-lg">
            <span class="material-symbols-outlined q-ma-md text-bold account">
              stethoscope
            </span>
            <div>
              <h6 class="text-bold q-ma-none text-center">Doctor</h6>
            </div>
          </div>
        </q-card>
        <q-card class="rounded-square-outline col">
          <div class="q-card-section q-pa-lg">
            <span class="material-symbols-outlined q-ma-md text-bold account">
              account_circle
            </span>
            <div>
              <h6 class="text-bold q-ma-none text-center">Patient</h6>
            </div>
          </div>
        </q-card>
      </div>
      <!---Form-->
      <div class="q-my-md">
        <p class="q-mb-none">Username</p>
        <q-input
          outlined
          v-model="text"
          :dense="dense"
          placeholder="Enter Username"
          class="uname"
        >
          <template v-slot:prepend>
            <q-icon name="person" color="black" />
          </template>
        </q-input>
      </div>
      <div class="q-my-md">
        <p class="q-mb-none">Password</p>
        <q-input
          outlined
          v-model="password"
          :type="isPwd ? 'password' : 'text'"
          :dense="dense"
          placeholder="Enter Password"
          label-color="black"
          class="pword"
          color="black"
        >
          <template v-slot:prepend>
            <q-icon name="lock_open" color="black" />
          </template>
        </q-input>
      </div>
      <div class="forgot">
        <q-btn flat unelevated class="forgotbtn">Forgot Password?</q-btn>
      </div>
      <div class="q-mb-lg">
        <q-btn rounded label="Login" class="loginbtn btn" />
      </div>
      <div class="q-mb-md flex-center">
        <q-separator color="black" class="line" inset />
        <span class="q-mx-md">OR</span>
        <q-separator color="black" class="line" inset />
      </div>
      <div class="q-mb-lg">
        <q-btn rounded label="Register" class="Registerbtn btn" />
      </div>
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
      text: ref(""),
      ph: ref(""),
      dense: ref(false),
      password: ref(""),
      isPwd: ref(true),
    };
  },
};
</script>
<style src="./styles/Login.scss"></style>
