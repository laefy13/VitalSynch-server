<template>
  <div class="container row login">
    <div class="column col flex items-center">
      <div class="q-mt-lg">
        <img src="src\assets\VitalSynch_logo_v1 2.png" />
      </div>
      <h2 class="text-bold q-my-md">VITAL SYNC</h2>
      <h5 class="text-weight-bolder q-mt-xl">Choose Account Type</h5>
      <div class="q-gutter-md row">
        <q-card
          v-ripple
          outline
          @click="handleAccount('doctor')"
          :class="[
            'account-btn',
            'q-mb-md',
            'long-btn',
            'cursor-pointer',
            'rounded-square-outline col',
            {
              'shadow-5 bg-primary text-white': account_type === 'doctor',
              '': account_type === 'ptnt',
            },
          ]"
        >
          <div class="q-card-section q-pa-lg">
            <span class="material-symbols-outlined q-ma-md text-bold account">
              stethoscope
            </span>
            <div>
              <h6 class="text-bold q-ma-none text-center">Doctor</h6>
            </div>
          </div>
        </q-card>
        <q-card
          class="rounded-square-outline col"
          @click="handleAccount('ptnt')"
          :class="[
            'account-btn',
            'q-mb-md',
            'long-btn',
            'cursor-pointer',
            'rounded-square-outline col',
            {
              'shadow-5 bg-primary text-white': account_type === 'ptnt',
              '': account_type === 'doctor',
            },
          ]"
        >
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
        <p class="q-mb-none">Email</p>
        <q-input
          outlined
          v-model="text"
          :dense="dense"
          placeholder="Enter Email"
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
        <q-btn flat unelevated class="forgotbtn" no-caps
          >Forgot Password?</q-btn
        >
      </div>
      <div class="q-mb-lg">
        <q-btn
          rounded
          label="Login"
          class="loginbtn btn"
          @click="handleLogin"
        />
      </div>
      <div class="q-mb-md flex-center">
        <q-separator color="black" class="line" inset />
        <span class="q-mx-md">OR</span>
        <q-separator color="black" class="line" inset />
      </div>
      <div class="q-mb-lg">
        <q-btn
          rounded
          label="Register"
          class="Registerbtn btn"
          @click="handleRegister"
        />
      </div>
    </div>

    <div class="col">
      <img src="src\assets\login-bg.png" class="bg" />
    </div>
  </div>
</template>
<script>
import { ref } from "vue";
import { httpPost, httpGet } from "boot/axios";
import { useRouter } from "vue-router";
export default {
  setup() {
    const text = ref("");
    const password = ref("");
    const dense = ref(false);
    const isPwd = ref(true);
    const router = useRouter();
    const account_type = ref("");
    const handleAccount = (type) => {
      account_type.value = type;
      console.log(account_type.value);
    };
    const payload = ref({});

    const handleLogin = () => {
      if (account_type.value == "ptnt") {
        payload.value = {
          ptnt_email: text.value,
          ptnt_password: password.value,
          user: account_type,
        };
      }
      if (account_type.value == "doctor") {
        payload.value = {
          doctor_email: text.value,
          doctor_password: password.value,
          user: account_type,
        };
        router.push({ name: "admin-dashboard" });
      }
      httpPost("/login", payload.value, {
        success: (response) => {
          const token = response.data["token"];
          const role = response.data["role"];
          localStorage.setItem("access_token", token);
          localStorage.setItem("user_role", role);
          if (account_type.value == "ptnt") {
            router.push({ name: "admin-dashboard" }); //change the route after magka patient dashboard
          }
          if (account_type.value == "doctor") {
            router.push({ name: "admin-dashboard" });
          }
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
    };
    // currently this function for Register
    // just so that the login > token thing is working

    const handleRegister = () => {
      router.push({ name: "register" });
    };

    return {
      text,
      password,
      dense,
      isPwd,
      account_type,
      handleLogin,
      handleRegister,
      handleAccount,
      ph: ref(""),
    };
  },
};
</script>
<style src="./styles/Login.scss"></style>
