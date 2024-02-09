<template>
  <q-page animated class="q-pa-xl dashboard">
    <!--<img
      alt="Quasar logo"
      src="~assets/quasar-logo-vertical.svg"
      style="width: 200px; height: 200px"
    >-->
    <div class="q-my-md">
      <h4 class="text-bold q-my-none">
        Welcome back,{{ patient.ptnt_first_name }}!
      </h4>
      <h5 class="q-ma-none">Here are the latest updates this week</h5>
    </div>
    <div class="q-my-md row">
      <div class="col q-mr-md">
        <div class="row q-mt-lg">
          <q-card
            class="col vs-card cursor-pointer q-hoverable"
            v-ripple
            @click="$router.push({ name: 'add-appointment' })"
          >
            <span class="q-focus-helper"></span>
            <q-card-section class="row">
              <q-avatar
                color="blue-2"
                text-color="blue"
                icon="event"
                class="q-mr-sm"
                size="70px"
              />
              <div class="col">
                <p class="text-h6 q-ma-none">Make an appointment</p>
                <p class="text-grey q-ma-none q-ellipsis">
                  Click to schedule an appointment
                </p>
                <q-linear-progress
                  :value="1"
                  rounded
                  color="blue"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
          <q-card class="col vs-card cursor-pointer q-hoverable" v-ripple>
            <span class="q-focus-helper"></span>
            <q-card-section class="row">
              <q-avatar
                color="orange-2"
                text-color="orange"
                icon="sym_o_local_hospital"
                class="q-mr-sm"
                size="70px"
              />
              <div class="col">
                <p class="text-h6 q-ma-none">Check medications</p>
                <p class="text-grey q-ma-none">Click to see prescriptions</p>
                <q-linear-progress
                  :value="1"
                  rounded
                  color="orange"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
        </div>
        <div class="row q-mt-sm">
          <q-card
            class="col q-mr-sm vs-card cursor-pointer q-hoverable"
            v-ripple
          >
            <span class="q-focus-helper"></span>
            <q-card-section class="row">
              <q-avatar
                color="red-2"
                text-color="red"
                icon="sym_o_emergency"
                class="q-mr-sm"
                size="70px"
              />
              <div class="col">
                <p class="text-h6 q-ma-none">View Lab Results</p>
                <p class="text-grey q-ma-none">Click to see lab results</p>
                <q-linear-progress
                  :value="1"
                  rounded
                  color="red"
                  class="q-mt-sm vs-line-progress"
                />
              </div>
            </q-card-section>
          </q-card>
          <q-card
            class="col vs-card cursor-pointer q-hoverable"
            v-ripple
            @click="$router.push({ name: 'update-user-info' })"
          >
            <span class="q-focus-helper"></span>
            <q-card-section class="row">
              <q-avatar
                color="light-green-2"
                text-color="green"
                icon="sym_o_demography"
                class="q-mr-sm"
                size="70px"
              />
              <div class="col">
                <p class="text-h6 q-ma-none">Update User Profile</p>
                <p class="text-grey q-ma-none">
                  Click to edit user information
                </p>
                <q-linear-progress
                  :value="1"
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
        <q-card class="q-mt-lg q-pa-lg full-width">
          <div class="row q-px-lg q-pb-xs">
            <div class="col-2">
              <q-avatar size="60px" class="shadow-10">
                <img
                  src="https://avatars3.githubusercontent.com/u/34883558?s=400&u=09455019882ac53dc69b23df570629fd84d37dd1&v=4"
                />
              </q-avatar>
            </div>
            <div class="col q-ml-md">
              <h6 class="text-bolder q-ma-none">
                {{ patient.ptnt_first_name }}
                {{ patient.ptnt_surname }}
              </h6>
              <p class="text-grey">{{ patient.ptnt_id }}</p>
            </div>
          </div>
          <q-separator></q-separator>
          <div class="row q-mt-xs">
            <div class="col">
              <p class="text-grey">Sex:</p>
              <p class="text-bold">{{ patient.ptnt_sex }}</p>
            </div>
            <div class="col">
              <p class="text-grey">Age:</p>
              <p class="text-bold">{{ patient.ptnt_age }}</p>
            </div>
            <div class="col">
              <p class="text-grey">Date of Birth:</p>
              <p class="text-bold">{{ patient.ptnt_birth_date }}</p>
            </div>
            <div class="col">
              <p class="text-grey">Name of Guardian:</p>
              <p class="text-bold"></p>
            </div>
          </div>
        </q-card>
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
          <h6 class="q-ma-lg text-weight-bolder">Booked Appointments</h6>
          <q-table
            style="height: 325px"
            flat
            dense
            bordered
            :rows="rows"
            :columns="columns"
            row-key="app_queue_num"
            virtual-scroll
            :rows-per-page-options="[0]"
          >
          </q-table>
        </q-card>
      </div>
      <div class="col"></div>
    </div>
  </q-page>
</template>
<script src="./scripts/Dashboard.js"></script>
<style src="./styles/Dashboard.scss"></style>
