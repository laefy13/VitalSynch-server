<template>
  <div class="appointment q-py-xl">
    <div class="row">
      <div class="flex justifty-start items-center q-mt- q-mb-lg gt-xs col">
        <q-btn @click="$router.go(-1)" round dense flat icon="arrow_back" />
        <h5 class="text-26 text-bold q-my-none q-ml-md page-header">
          Appointment Tracker
        </h5>
      </div>
    </div>
    <div class="row">
      <div class="col-7 q-mr-xs">
        <q-table
          :rows="pendingAppointments"
          :columns="pending_columns"
          virtual-scroll
          :filter="filterPending"
          title="Appointments"
          row-key="app_queue_num"
          class="q-mx-md"
          clickable
          @row-click="onRowClick"
        >
          <template v-slot:top>
            <q-toolbar class="bg-primary">
              <h7 class="text-bold"
                >Appointments Requests ({{ pendingAppointments.length }})</h7
              >

              <q-space />

              <q-input
                borderless
                dense
                debounce="300"
                v-model="filterPending"
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
              <div class="row">
                <q-btn
                  dense
                  class="q-ma-xs full-width bg-green-2"
                  @click="handleAppointment(props.row, 1)"
                >
                  Accept
                </q-btn>
                <q-btn
                  dense
                  class="q-ma-xs full-width bg-red-2"
                  @click="handleAppointment(props.row, 2)"
                >
                  Reject</q-btn
                >
              </div>
            </q-td>
          </template>
          <template v-if="!pendingAppointments.length" v-slot:bottom-row>
            <q-tr>
              <q-td colspan="100%" class="text-center">
                No Data Available
              </q-td>
            </q-tr>
          </template>
        </q-table>
        <q-dialog v-model="bar" v-if="bar == true">
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
      <div class="col">
        <q-table
          :rows="acceptedAppointments"
          :columns="accepted_columns"
          virtual-scroll
          :filter="filterAccepted"
          title="Appointments"
          row-key="id"
          class="q-mx-md"
          dense
        >
          <template v-slot:top>
            <q-toolbar class="bg-primary">
              <h7 class="text-bold"
                >Accepted Appointments ({{ acceptedAppointments.length }})</h7
              >

              <q-space />

              <q-input
                borderless
                dense
                debounce="300"
                v-model="filterAccepted"
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
                      @click="handleAppointment(props.row, 0)"
                      v-close-popup
                      class="menu-list"
                    >
                      <q-item-section>Mark as pending</q-item-section>
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
              <q-td colspan="100%" class="text-center">
                No Data Available
              </q-td>
            </q-tr>
          </template>
        </q-table>
        <q-table
          :rows="rejectedAppointments"
          :columns="accepted_columns"
          virtual-scroll
          :filter="filterRejected"
          title="Appointments"
          row-key="app_queue_num"
          class="q-mx-md q-my-md"
          dense
        >
          <template v-slot:top>
            <q-toolbar class="bg-primary">
              <h7 class="text-bold"
                >Rejected Appointments ({{ rejectedAppointments.length }})</h7
              >

              <q-space />

              <q-input
                borderless
                dense
                debounce="300"
                v-model="filterRejected"
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
                    <q-item clickable v-close-popup class="menu-list">
                      <q-item-section @click="handleAppointment(props.row, 0)"
                        >Mark as Pending</q-item-section
                      >
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
              <q-td colspan="100%" class="text-center">
                No Data Available
              </q-td>
            </q-tr>
          </template>
        </q-table>
      </div>
    </div>
  </div>
</template>
<style></style>
<script src="./scripts/AppointmentTracker.js"></script>
