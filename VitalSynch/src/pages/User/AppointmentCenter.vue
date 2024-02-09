<template>
  <div class="appointment q-py-lg">
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
          >Book an Appointment</q-btn
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
        row-key="app_queue_num"
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
                    @click="handleViewAppointment(props.row)"
                    v-close-popup
                    class="menu-list"
                  >
                    <q-item-section>View Appointment</q-item-section>
                  </q-item>
                  <q-item clickable v-close-popup class="menu-list">
                    <q-item-section>Edit</q-item-section>
                  </q-item>
                  <q-item clickable v-close-popup class="menu-list">
                    <q-item-section>Cancel</q-item-section>
                  </q-item>
                </q-list>
              </q-menu>
              <q-dialog v-model="bar">
                <q-card style="min-width: 300px">
                  <q-bar class="q-pa-lg bg-white">
                    <div>Patient-type</div>

                    <q-space />
                    <q-btn dense flat icon="edit" v-close-popup> </q-btn>

                    <q-btn dense flat icon="close" v-close-popup>
                      <q-tooltip>Close</q-tooltip>
                    </q-btn>
                  </q-bar>
                  <q-separator></q-separator>
                  <q-card-section>
                    <div class="row">
                      <div class="col-2 text-primary">
                        <q-icon name="sym_o_assignment_ind" size="2.4em" />
                      </div>
                      <div class="col block">
                        <p class="q-mb-none text-bold">
                          {{ selectedAppointment.app_full_name }}
                        </p>
                        <p>{{ selectedAppointment.app_patient_id }}</p>
                      </div>
                    </div>
                    <q-separator class="q-mb-md"></q-separator>
                    <div class="row">
                      <div class="col-2 block text-primary">
                        <q-icon name="calendar_month" size="2.4em" />
                        <br />
                        <br />
                        <q-icon name="sym_o_stethoscope" size="2.4em"></q-icon>
                        <br />
                        <br />
                        <q-icon name="medical_services" size="2.4em"></q-icon>
                      </div>
                      <div class="col block">
                        <p class="q-mb-none text-bold">
                          {{ selectedAppointment.app_time }}
                        </p>
                        <p>{{ selectedAppointment.app_date }}</p>
                        <p class="q-mb-none text-bold">
                          {{ selectedAppointment.app_doctor_name }}
                        </p>
                        <p>{{ selectedAppointment.app_department }}</p>
                        <p class="q-mb-none text-bold">
                          {{ selectedAppointment.app_service }}
                        </p>
                        <p>{{ selectedAppointment.app_symptoms }}</p>
                      </div>
                    </div>
                  </q-card-section>
                </q-card>
              </q-dialog>
            </div>
          </q-td>
        </template>
        <template v-slot:body-cell-status="props">
          <q-td :props="props">
            <q-badge v-if="props.row.app_is_accepted === 0" color="blue"
              >Pending</q-badge
            >
            <q-badge v-if="props.row.app_is_accepted === 1" color="green"
              >Approved</q-badge
            >
            <q-badge v-if="props.row.app_is_accepted === 2" color="green"
              >Cancelled</q-badge
            >
            <q-badge v-if="props.row.app_is_accepted === 3" color="green"
              >Done</q-badge
            >
          </q-td>
        </template>
        <template v-if="!rows.length" v-slot:bottom-row>
          <q-tr>
            <q-td colspan="100%" class="text-center">
              No Appointment Request :>
            </q-td>
          </q-tr>
        </template>
      </q-table>
    </div>
  </div>
</template>
<style src="./styles/AppointmentCenter.scss"></style>
<script src="./scripts/AppointmentCenter.js"></script>
