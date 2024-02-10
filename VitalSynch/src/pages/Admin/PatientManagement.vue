<template>
  <div class="om-main-scroll table-scroll">
    <!-- row-key = "range_type" example -->
    <q-table
      :rows="rows"
      :columns="columns"
      row-key="ptnt_id"
      :filter="filter"
      class="gt-xs"
      flat
    >
      <template v-slot:top>
        <q-toolbar class="bg-primary">
          <h7 class="text-bold">Patients Total ({{ rows.length }})</h7>

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
      <template v-slot:body-cell-action="props">
        <q-td :props="props">
          <div class="table-menu">
            <q-btn icon="more_vert" class="" flat round />
            <q-menu class="menu-container">
              <q-list>
                <q-item
                  clickable
                  :to="{
                    name: 'patient-profile',
                    params: { id: props.row.ptnt_id },
                  }"
                  v-close-popup
                  class="menu-list"
                >
                  <q-item-section>View Profile</q-item-section>
                </q-item>
                <q-item
                  clickable
                  v-close-popup
                  class="menu-list"
                  @click="handleAddMedicalRecord(props.row)"
                >
                  <q-item-section>Add Medical Record</q-item-section>
                </q-item>
              </q-list>
            </q-menu>
          </div>
        </q-td>
      </template>
      <template v-if="!rows.length" v-slot:bottom-row>
        <q-tr>
          <q-td colspan="100%" class="text-center"> No Data Available </q-td>
        </q-tr>
      </template>
    </q-table>
    <q-dialog v-model="bar">
      <q-card class="fit-content q-pa-lg">
        <q-bar class="bg-white">
          <div>Add Medical Record</div>
          <q-space></q-space>

          <q-btn dense flat icon="close" @click="bar = false">
            <q-tooltip>Close</q-tooltip>
          </q-btn>
        </q-bar>
        <q-separator></q-separator>
        <h6 class="q-ma-none q-mt-md">Medical Form</h6>
        <form @submit.prevent="submitMedicalRecord">
          <div class="form-group">
            <label for="height">Height (cm):</label>
            <input
              type="number"
              v-model="medicalRecord.medhis_height"
              required
            />
          </div>

          <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input
              type="number"
              v-model="medicalRecord.medhis_weight"
              required
            />
          </div>

          <div class="form-group">
            <label for="bloodPressure">Blood Pressure:</label>
            <input
              type="text"
              v-model="medicalRecord.medhis_blood_pressure"
              required
            />
          </div>

          <div class="form-group">
            <label for="glucose">Glucose Level:</label>
            <input
              type="number"
              v-model="medicalRecord.medhis_glucose"
              required
            />
          </div>

          <div class="form-group">
            <label for="illness">Illness:</label>
            <textarea
              v-model="medicalRecord.medhis_illness"
              required
            ></textarea>
          </div>

          <button type="submit">Submit</button>
        </form>
      </q-card>
    </q-dialog>
  </div>
</template>
<script src="./scripts/PatientManagement.js"></script>
<style scoped>
.form-group {
  margin-bottom: 20px;
}

input,
textarea {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
  margin-top: 5px;
}
</style>
