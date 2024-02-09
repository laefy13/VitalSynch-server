<template>
  <q-layout
    view="hHh Lpr lff"
    container
    style="min-height: calc(100vh - 10px)"
    position="relative"
  >
    <q-drawer
      v-model="drawer"
      show-if-above
      :mini="miniState"
      @mouseover="miniState = false"
      @mouseout="miniState = true"
      :width="250"
      :breakpoint="500"
      bordered
      content-class="bg-grey-3"
      style="position: fixed; top: 0; left: 0; height: 100vh; z-index: 1000"
    >
      <div class="fit" :horizontal-thumb-style="{ opacity: 0 }">
        <q-list padding>
          <q-item clickable v-ripple>
            <q-item-section avatar>
              <q-icon name="dashboard" class="q-my-md" />
            </q-item-section>

            <q-item-section>
              <h6 class="q-my-md">VitalSynch</h6>
            </q-item-section>
          </q-item>
          <q-item clickable v-ripple>
            <q-item-section avatar>
              <q-icon name="search" />
            </q-item-section>

            <q-item-section>
              <q-input
                outlined
                bg-color="white"
                class="full-width main-search"
                dense
                placeholder="Search"
              >
                <template v-slot:prepend>
                  <q-icon name="search" />
                </template>
              </q-input>
            </q-item-section>
          </q-item>

          <q-item v-ripple>
            <q-item-section> Activity </q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple

            @click="selectItem(0, 'admin-dashboard')"
            :class="{ 'selected-item': selectedItem === 0 }"
          >
            <q-item-section avatar>
              <q-icon name="dashboard" />
            </q-item-section>

            <q-item-section> Dashboard </q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple
            @click="selectItem(1, 'patient-management')"
            :class="{ 'selected-item': selectedItem === 1 }"
          >
            <q-item-section avatar>
              <q-icon name="groups" />
            </q-item-section>

            <q-item-section> Patient Management </q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple
            @click="selectItem(2, 'appointment-tracker')"
            :class="{ 'selected-item': selectedItem === 2 }"
          >
            <q-item-section avatar>
              <q-icon name="pending_actions" />
            </q-item-section>

            <q-item-section> Appointment Tracker </q-item-section>
          </q-item>

          <q-item clickable v-ripple
            @click="selectItem(3, 'appointment-tracker')"
            :class="{ 'selected-item': selectedItem === 3 }">
            <q-item-section avatar>
              <q-icon name="notes" />
            </q-item-section>

            <q-item-section> Clinical Documentation </q-item-section>
          </q-item>

          <q-item clickable v-ripple
            @click="selectItem(5, 'appointment-tracker')"
            :class="{ 'selected-item': selectedItem === 5 }">
            <q-item-section avatar>
              <q-icon name="medication" />
            </q-item-section>

            <q-item-section> Prescription Center </q-item-section>
          </q-item>
          <br />

          <q-separator />
          <q-item v-ripple>
            <q-item-section> Information </q-item-section>
          </q-item>

          <q-item clickable v-ripple 
            @click="selectItem(6, 'appointment-tracker')"
            :class="{ 'selected-item': selectedItem === 6 }">
            <q-item-section avatar>
              <q-icon name="help" />
            </q-item-section>

            <q-item-section> Support </q-item-section>
          </q-item>
          <q-item clickable v-ripple 
            @click="selectItem(7, 'appointment-tracker')"
            :class="{ 'selected-item': selectedItem === 7 }">
            <q-item-section avatar>
              <q-icon name="settings" />
            </q-item-section>

            <q-item-section> Settings </q-item-section>
          </q-item>
        </q-list>
      </div>
    </q-drawer>
    <q-page-container>
      <q-page padding class="bg-cyan-1">
        <div class="q-pb-md">
          <div class="row">
            <div class="col-8">
              <q-input
                outlined
                bg-color="white"
                class="full-width main-search"
                dense
                placeholder="Search Filter..."
              >
                <template v-slot:prepend>
                  <q-icon name="search" />
                </template>
              </q-input>
            </div>
            <div class="col flex justify-end">
              <q-icon name="notifications" size="32px"></q-icon>
            </div>
          </div>
        </div>
        <div class="app-wrapper bg-white rounded-borders border-radius-3">
          <router-view />
        </div>
      </q-page>
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      miniState: true,
      selectedItem: 0,
    };
  },
  methods: {
    selectItem(index, routeName) {
      this.selectedItem = index;
      this.$router.push({ name: routeName });
    },
  },
};
</script>

<style lang="scss" scoped>
.app-wrapper {
  overflow: hidden;
  @media only screen and (max-width: 767px) {
    padding: 0px !important;
  }

}
.selected-item {
  background-color: #7cdae4;
  color: #000000; 
}
</style>
