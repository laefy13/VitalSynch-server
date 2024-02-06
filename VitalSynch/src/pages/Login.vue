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
        <q-btn flat unelevated class="forgotbtn">Forgot Password? "</q-btn>
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
          @click="handleTest"
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

    const handleLogin = () => {
      const payload = {
        usr_email: text.value,
        usr_password: password.value,
      };

      httpPost("/login", payload, {
        success: (response) => {
          const token = response.data["token"];
          localStorage.setItem("access_token", token);
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
    };
    // currently this function for Register
    // just so that the login > token thing is working

    const handleTest = () => {
      httpGet("/allergy/1", {
        success: (response) => {
          // Assuming the token is returned in the response
          console.log(response.data);
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
      const payload = {
        usr_email: "newuser@example.com",
        usr_username: "newusername",
        usr_password: "hashedpassword", // Make sure to hash the password using a secure algorithm
        usr_acc_type: 1, // Assuming 1 represents a regular user account type
      };

      httpPost("/user_acc", payload, {
        success: (response) => {
          console.log(response.data);
        },
        catch: (error) => {
          console.error("Login Error:", error);
        },
      });
      router.push({ name: "register" });
    };

    return {
      text,
      password,
      dense,
      isPwd,
      handleLogin,
      handleTest,
      ph: ref(""),
    };
  },
};
</script>
<style src="./styles/Login.scss"></style>
