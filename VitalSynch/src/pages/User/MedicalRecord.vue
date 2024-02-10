<template>
  <div>
    <q-table
      :rows="medicalHistoryRecords"
      :columns="columns2"
      :filter="filter"
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
            v-model="filter1"
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
  </div>
</template>
<script src="./scripts/MedicalRecord.js"></script>
