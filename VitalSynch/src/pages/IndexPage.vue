<template>
  <q-page class="q-pa-md">
    <div class="q-my-md">
      <h5 class="text-bold q-my-none">
        Welcome back, {{ userData && userData.usr_username }}
      </h5>
      <h7> Here are the latest updates this week</h7>
    </div>
    <div class="q-my-md row">
      <div class="col">
        <div class="row q-mt-sm">
          <q-card class="col q-mr-sm">
            <q-card-section>
              <q-icon name="event"> </q-icon>
              Appointments today
            </q-card-section>
          </q-card>
          <q-card class="col">
            <q-card-section>
              <q-icon name="local_hospital" />
              OPD today
            </q-card-section>
          </q-card>
        </div>
        <div class="row q-mt-sm">
          <q-card class="col q-mr-sm">
            <q-card-section>
              <q-icon name="emergency" />
              In patients
            </q-card-section>
          </q-card>
          <q-card class="col">
            <q-card-section>
              <q-icon name="heart_plus" />
              Discharged patients
            </q-card-section>
          </q-card>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";
import { api } from 'boot/axios'

export default defineComponent({
  name: "IndexPage",
  data() {
    return {
      userData: null
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      // the 11 should be the user id returned with the token from login
      api.get('user_acc/11')
      .then((response) => {
        console.log(response.data);
        this.userData = response.data[0];
        console.log(this.userData);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
    }
  }
});
</script>
