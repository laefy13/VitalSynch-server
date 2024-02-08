const routes = [
  {
    path: "/login",
    name: "login",
    component: () => import("../pages/Login.vue"),
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../pages/Register.vue")
  },
  {
    path: "/",
    redirect: {
      name: "login",
    },
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "admin-dashboard",
        name: "admin-dashboard",
        component: () => import("pages/Admin/Dashboard.vue"),
        meta:{
          requiresAuth: true, role: 'doctor'
        },
      },
      {
        path: "patient-management",
        component: () => import("pages/Admin/PatientManagement.vue"),
        meta:{
          requiresAuth: true, role: 'doctor'
        },
      },
      {
        path: "appointment-center",
        name: "appointment-center",
        component: () => import("pages/User/AppointmentCenter.vue"),
        meta:{
          requiresAuth: true, role: 'patient'
        },
      },
      {
        path: "add-appointment",
        name: "add-appointment",
        component: () => import("pages/User/AddAppointment.vue"),
        meta:{
          requiresAuth: true, role: 'patient'
        },
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
