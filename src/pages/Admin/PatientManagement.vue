<template>
  <div class="om-main-scroll table-scroll">
    <!-- row-key = "range_type" example -->
    <q-table
      :rows="rows"
      :columns="columns"
      v-model:pagination="pagination"
      row-key="id"
      class="gt-xs"
      flat
    >
      <template v-slot:body-cell-action="props">
        <q-td :props="props">
          <div class="table-menu">
            <q-btn icon="more_vert" class="" flat round dense />
            <q-menu class="menu-container">
              <q-list>
                <q-item
                  clickable
                  :to="{ name: 'add-new-range', params: { id: props.row.id } }"
                  v-close-popup
                  class="menu-list"
                >
                  <q-item-section>Edit</q-item-section>
                </q-item>
                <q-item clickable v-close-popup class="menu-list">
                  <q-item-section>Delete</q-item-section>
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
