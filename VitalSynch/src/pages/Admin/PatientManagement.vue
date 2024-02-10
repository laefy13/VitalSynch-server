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
                <q-item clickable v-close-popup class="menu-list">
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
  </div>
</template>
<script src="./scripts/PatientManagement.js"></script>
