<template>
  <q-page class="q-pa-xl dashboard">
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
              <q-avatar
                color="blue-2"
                text-color="blue"
                icon="event"
                class="q-mr-sm"
              />
              <div class="col">
                Appointments todays
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="blue"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
          <q-card class="col vs-card">
            <q-card-section class="row">
              <q-avatar
                color="orange-2"
                text-color="orange"
                icon="sym_o_local_hospital"
                class="q-mr-sm"
              />
              <div class="col">
                OPD today
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="orange"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
        </div>
        <div class="row q-mt-sm">
          <q-card class="col q-mr-sm vs-card">
            <q-card-section class="row">
              <q-avatar
                color="red-2"
                text-color="red"
                icon="sym_o_emergency"
                class="q-mr-sm"
              />
              <div class="col">
                In patients
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="red"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
          <q-card class="col vs-card">
            <q-card-section class="row">
              <q-avatar
                color="light-green-2"
                text-color="green"
                icon="sym_o_demography"
                class="q-mr-sm"
              />
              <div class="col">
                Discharged patients
                <q-linear-progress
                  :value="0.8"
                  rounded
                  color="green"
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
        <q-card class="q-pa-lg row tutorial bg-cyan text-white">
          <div class="col text-center">
            <img src="src\assets\tutorial-logo.png" />
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
                <h6 class="q-ma-none text-center text-black">Start tutorial</h6>
              </q-card-section>
            </q-card>
          </div>
        </q-card>
        <q-card class="q-pa-md q-mt-md">
          <h6 class="q-ma-lg text-weight-bolder">Booked Appointments Today</h6>
          <q-table
            style="height: 325px"
            flat
            dense
            bordered
            :rows="appointments_today"
            :columns="columns"
            row-key="app_queue_num"
            virtual-scroll
            :rows-per-page-options="[0]"
          >
            <template v-if="!appointments_today.length" v-slot:bottom-row>
              <q-tr>
                <q-td colspan="100%" class="text-center">
                  <p class="text-bold q-ma-lg">No appointments for today :'></p>
                </q-td>
              </q-tr>
            </template>
          </q-table>
        </q-card>
      </div>
      <div class="col">
        <q-card class="q-pa-none">
          <q-table
            flat
            bordered
            dense
            style="min-height: 600px"
            :rows="rows2"
            :columns="columns2"
            row-key="doctor_id"
            class="q-pa-lg bg-cyan-1"
            virtual-scroll
            :rows-per-page-options="[0]"
          >
            <template v-slot:top>
              <h6 class="q-ma-none">Doctors</h6>
            </template>

            <template v-slot:header="props">
              <q-tr :props="props" style="height: 50px">
                <q-th
                  v-for="col in props.cols"
                  :key="col.name"
                  :props="props"
                  class="bg-primary text-bold"
                >
                  {{ col.label }}
                </q-th>
              </q-tr>
            </template>
            <template v-slot:body-cell-status="props">
              <q-td :props="props">
                <q-badge color="red-2"> {{ props.status }} </q-badge>
              </q-td>
            </template>
            <template v-slot:body-cell-doctorPicture="props">
              <q-td :props="props">
                <q-avatar color="red-2">
                  <img
                    src="https://avatars3.githubusercontent.com/u/34883558?s=400&u=09455019882ac53dc69b23df570629fd84d37dd1&v=4"
                  />
                </q-avatar>
              </q-td>
            </template>
          </q-table>
        </q-card>
      </div>
    </div>
  </q-page>
</template>
<script src="./scripts/Dashboard.js"></script>
<style src="./styles/Dashboard.scss"></style>
