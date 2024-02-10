<template>
  <div class="patient-profile">
    <div class="flex justifty-start items-center q-mt-lg gt-xs col">
      <q-btn @click="$router.go(-1)" round dense flat icon="arrow_back" />
      <h5 class="text-black text-bold q-my-none q-ml-md page-header">
        Patient Profile
      </h5>
    </div>
    <div class="row">
      <div class="col q-ma-md">
        <q-card class="card-size-s q-my-md q-pa-lg">
          <div class="row q-px-lg q-pb-md">
            <div class="col-2">
              <q-avatar size="70px" class="shadow-10">
                <img
                  src="https://img.freepik.com/free-photo/smiling-asian-doctor-female-nurse-holding-clipboard-pen-wearing-uniform-with-gloves-writing-pati_1258-83340.jpg?w=996&t=st=1707486850~exp=1707487450~hmac=424bffe5e947b91c3e0726b2005c65d074fcbbfdc202bf6433c59834ce20d70d"
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
          <div class="q-mx-lg row block justify-between">
            <p class="text-bold">Contact details:</p>

            <div class="row">
              <q-icon name="phone" class="q-mr-lg"> </q-icon>
              <span>{{ patient.ptnt_contact_number }}</span>
            </div>

            <div class="row">
              <q-icon name="mail " class="q-mr-lg"></q-icon>
              <span>{{ patient.ptnt_email }}</span>
            </div>

            <div class="row">
              <q-icon name="house" class="q-mr-lg"></q-icon>
              <span>{{ patient.ptnt_address }}</span>
            </div>
          </div>
        </q-card>
        <q-card class="card-size-s q-my-md q-pa-lg row">
          <h6 class="text-bolder q-ma-none col">Lab Results</h6>
          <q-uploader
            style="max-width: 300px"
            class="my-card"
            :filter="checkFileSize"
            :fieldName="(file) => `image${file.name}`"
            multiple
            batch
            :url="labRepUploadUrl"
            label="Select Course Image to Upload"
          />
        </q-card>
        <q-card class="card-size-s q-my-md q-pa-lg row">
          <h6 class="text-bolder q-ma-none col">Prescription Documents</h6>
          <q-uploader
            style="max-width: 300px"
            class="my-card"
            :filter="checkFileSize"
            :fieldName="(file) => `image${file.name}`"
            multiple
            batch
            :url="prescriptionUploadUrl"
            label="Select Course Image to Upload"
          />
        </q-card>
      </div>
      <div class="col-7 q-my-md">
        <q-card class="q-my-md q-pa-lg">
          <h6 class="text-bolder q-ma-none">Overview</h6>
          <div class="row">
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
        <q-card class="card-size-l q-my-md q-pa-lg">
          <q-table
            :rows="ptnt_appointments"
            :columns="columns"
            :filter="filter"
            row-key="id"
            class="q-pa-none"
            flat
          >
            <template v-slot:top>
              <q-toolbar class="q-pa-none">
                <h6 class="text-bolder q-ma-none">Appointments</h6>

                <q-space />

                <q-input
                  borderless
                  dense
                  debounce="300"
                  v-model="filter"
                  placeholder="Search"
                >
                  <template v-slot:append>
                    <q-icon name="search" />
                  </template>
                </q-input>
              </q-toolbar>
            </template>
            <template v-slot:header="props">
              <q-tr :props="props">
                <q-th
                  v-for="col in props.cols"
                  :key="col.name"
                  :props="props"
                  class="bg-primary"
                >
                  {{ col.label }}
                </q-th>
              </q-tr>
            </template>
          </q-table>
          <q-table
            :rows="medicalHistoryRecords"
            :columns="columns2"
            :filter="filter2"
            row-key="id"
            class="q-pa-none"
            flat
          >
            <template v-slot:top>
              <q-toolbar class="q-pa-none">
                <h6 class="text-bolder q-ma-none">Medical Records</h6>

                <q-space />

                <q-input
                  borderless
                  dense
                  debounce="300"
                  v-model="filter2"
                  placeholder="Search"
                >
                  <template v-slot:append>
                    <q-icon name="search" />
                  </template>
                </q-input>
              </q-toolbar>
            </template>
            <template v-slot:header="props">
              <q-tr :props="props">
                <q-th
                  v-for="col in props.cols"
                  :key="col.name"
                  :props="props"
                  class="bg-primary"
                >
                  {{ col.label }}
                </q-th>
              </q-tr>
            </template>
          </q-table>
        </q-card>
      </div>
    </div>
  </div>
</template>
<script src="./scripts/PatientProfile.js"></script>
<style src="./styles/PatientProfile.scss"></style>
