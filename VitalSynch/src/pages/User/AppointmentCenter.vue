<template>
  <div class="appointment q-py-xl">
    <div class="row">
      <div class="flex justifty-start items-center q-mt- q-mb-lg gt-xs col">
        <q-btn @click="$router.go(-1)" round dense flat icon="arrow_back" />
        <h5 class="text-26 text-bold q-my-none q-ml-md page-header">
          Appointment Center
        </h5>
      </div>
      <div class="flex justify-end col">
        <q-btn
          no-caps
          class="q-ma-md text-black text-bold shadow-1"
          color="primary"
          @click="$router.push({ name: 'add-appointment' })"
          >Book Consultation</q-btn
        >
      </div>
    </div>
    <div>
      <q-table
        :rows="rows"
        :columns="columns"
        v-model:pagination="pagination"
        :filter="filter"
        title="Appointments"
        row-key="id"
        class="gt-xs"
        flat
      >
        <template v-slot:top>
          <q-toolbar class="bg-primary">
            <h7 class="text-bold">Appointments Total ({{ rows.length }})</h7>

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
                      name: 'add-new-range',
                      params: { id: props.row.id },
                    }"
                    v-close-popup
                    class="menu-list"
                  >
                    <q-item-section>Re-schedule</q-item-section>
                  </q-item>
                  <q-item clickable v-close-popup class="menu-list">
                    <q-item-section>Cancel</q-item-section>
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
  </div>
</template>
<style src="./styles/AddAppointment.scss"></style>
<script src="./scripts/AppointmentCenter.js"></script>
