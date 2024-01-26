<template>
  <q-page class="q-pa-md">
    <!--<img
      alt="Quasar logo"
      src="~assets/quasar-logo-vertical.svg"
      style="width: 200px; height: 200px"
    >-->
    <div class="q-my-md">
      <h5 class="text-bold q-my-none"> Welcome back, Karlos! </h5>
      <h7> Here are the latest updates this week</h7>
    </div>
    <div class="q-my-md row">
      <div class="col">
        <div class="row q-mt-sm">
          <q-card class="col q-mr-sm">
            <q-card-section>
              <q-icon name="event">

              </q-icon>
                Appointments today
              </q-card-section>
            </q-card>
          <q-card class="col">
            <q-card-section>
              <q-icon name="local_hospital"/>
              OPD today
            </q-card-section>
          </q-card>
        </div>
        <div class="row q-mt-sm">
          <q-card class="col q-mr-sm">
            <q-card-section>
              <q-icon name="emergency"/>
                In patients
              </q-card-section>
            </q-card>
          <q-card class="col">
            <q-card-section>
              <q-icon name="heart_plus"/> 
              Discharged patients
            </q-card-section>
          </q-card>
        </div>
      </div>
      <div class="col">

      </div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'IndexPage'
})
</script>
