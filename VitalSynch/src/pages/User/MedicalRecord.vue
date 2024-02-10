<template>
  <div>
    <div class="flex justifty-start items-center q-mt-lg q-mb-lg gt-xs col">
      <q-btn @click="$router.go(-1)" round dense flat icon="arrow_back" />
      <h5 class="text-26 text-bold q-my-none q-ml-md page-header">
        Medical Records
      </h5>
    </div>
    <q-table
      :rows="medicalHistoryRecords"
      :columns="columns2"
      :filter="filter"
      row-key="id"
      class="q-pa-none"
      flat
    >
      <template v-slot:top>
        <q-toolbar class="q-pa-none bg-primary">
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
          <q-th v-for="col in props.cols" :key="col.name" :props="props">
            {{ col.label }}
          </q-th>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>
<script src="./scripts/MedicalRecord.js"></script>
