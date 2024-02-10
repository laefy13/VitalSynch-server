const routes = [
  {
    path: "/login",
    name: "login",
    component: () => import("../pages/Login.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../pages/Register.vue"),
  },
  {
    path: "/",
    redirect: {
      name: "login",
    },
  },
  // Doctor Routes
  {
    path: "/admin",
    component: () => import("layouts/AdminLayout.vue"),
    children: [
      {
        path: "admin-dashboard",
        name: "admin-dashboard",
        component: () => import("pages/Admin/Dashboard.vue"),
        meta: {
          requiresAuth: true,
          role: "doctor",
        },
      },
      {
        path: "patient-management",
        name: "patient-management",
        component: () => import("pages/Admin/PatientManagement.vue"),
        meta: {
          requiresAuth: true,
          role: "doctor",
        },
      },
      {
        path: "appointment-tracker",
        name: "appointment-tracker",
        component: () => import("pages/Admin/AppointmentTracker.vue"),
        meta: {
          requiresAuth: true,
          role: "doctor",
        },
      },
      {
        path: "patient-profile/:id?",
        name: "patient-profile",
        component: () => import("pages/Admin/PatientProfile.vue"),
        meta: {
          requiresAuth: true,
          role: "doctor",
        },
      },
      {
        path: "medical-record",
        name: "medical-record",
        component: () => import("pages/Admin/MedicalRecord.vue"),
        meta: {
          requiresAuth: true,
          role: "doctor",
        },
      },
    ],
  },
  // Patient Routes
  {
    path: "/patient",
    component: () => import("layouts/UserLayout.vue"),
    children: [
      {
        path: "patient-dashboard",
        name: "patient-dashboard",
        component: () => import("pages/User/PatientDashboard.vue"),
        meta: {
          requiresAuth: true,
          role: "patient",
        },
      },
      {
        path: "appointment-center",
        name: "appointment-center",
        component: () => import("pages/User/AppointmentCenter.vue"),
        meta: {
          requiresAuth: true,
          role: "patient",
        },
      },
      {
        path: "add-appointment",
        name: "add-appointment",
        component: () => import("pages/User/AddAppointment.vue"),
        meta: {
          requiresAuth: true,
          role: "patient",
        },
      },
      {
        path: "update-user-info",
        name: "update-user-info",
        component: () => import("pages/User/UpdateUserInformation.vue"),
        meta: {
          requiresAuth: true,
          role: "patient",
        },
      },
      {
        path: "edit-appointment/:id",
        name: "edit-appointment",
        component: () => import("pages/User/EditAppointment.vue"),
        meta: {
          requiresAuth: true,
          role: "patient",
        },
      },
    ],
  },
  // 404 Not Found
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
