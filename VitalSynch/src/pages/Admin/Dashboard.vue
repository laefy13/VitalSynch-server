<template>
  <q-page class="q-pa-xl">
    <!--<img
      alt="Quasar logo"
      src="~assets/quasar-logo-vertical.svg"
      style="width: 200px; height: 200px"
    >-->
    <div class="q-my-md">
      <h4 class="text-bold q-my-none">Welcome back, Karlos!</h4>
      <h5 class="q-ma-none">Here are the latest updates this week</h5>
    </div>
    <div class="q-my-md row">
      <div class="col q-mr-md">
        <div class="row q-mt-lg">
          <q-card class="col q-mr-sm vs-card">
            <q-card-section class="row">
              <div class="col-3">
                <q-icon name="event"> </q-icon>
              </div>
              <div class="col">
                Appointments todays
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="accent"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
          <q-card class="col vs-card">
            <q-card-section class="row">
              <q-icon name="local_hospital" class="col-3" />
              <div class="col">
                OPD today
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="accent"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
        </div>
        <div class="row q-mt-sm">
          <q-card class="col q-mr-sm vs-card">
            <q-card-section class="row">
              <q-icon name="emergency" class="col-3" />
              <div class="col">
                In patients
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="accent"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
          <q-card class="col vs-card">
            <q-card-section class="row">
              <q-icon name="heart_plus" class="col-3" />
              <div class="col">
                Discharged patients
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="accent"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
        </div>
      </div>
      <div class="col">
        <h6 class="q-ma-none">Covid Monthly Report</h6>
        <apexchart
          type="bar"
          height="250"
          :options="chartOptions"
          :series="series"
        ></apexchart>
      </div>
    </div>
    <div class="row">
      <div class="col-7 q-mr-lg">
        <q-card class="q-pa-lg row">
          <div class="col">
            <q-icon name="edit" size="30px"></q-icon>
          </div>
          <div class="col-7">
            <h6 class="q-my-none">Want to explore our features?</h6>
            <p>
              Access our tutorial for a seamless experience with VitalSynch.
              Click “Start tutorial” and begin enhancing your navigation skills
              and explore advanced features.
            </p>
          </div>
          <div class="col-3 self-end">
            <q-card class="q-mt-lg q-ml-lg">
              <q-card-section class="justify-center">
                <h6 class="q-ma-none text-center">Start tutorial</h6>
              </q-card-section>
            </q-card>
          </div>
        </q-card>
        <q-card class="q-pa-md q-mt-md">
          <h6 class="q-ma-lg text-weight-bolder">Booked Appointments Today</h6>
          <q-table
            style="height: 400px"
            flat
            bordered
            :rows="rows"
            :columns="columns"
            row-key="index"
            virtual-scroll
            v-model:pagination="pagination"
            :rows-per-page-options="[0]"
          />
        </q-card>
      </div>
      <div class="col">
        <q-card class="q-pa-md">
          <q-table
            style="height: 400px"
            flat
            bordered
            :rows="rows2"
            :columns="columns2"
            row-key="index"
            virtual-scroll
            v-model:pagination="pagination"
            :rows-per-page-options="[0]"
          />
        </q-card>
      </div>
    </div>
  </q-page>
</template>
<script src="./scripts/Dashboard.js"></script>
