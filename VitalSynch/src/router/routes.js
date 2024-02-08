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
<<<<<<< HEAD
        meta:{
          requiresAuth: true, role: 'doctor'
=======
        meta: {
          requiresAuth: true,
          role: "doctor",
>>>>>>> 2e1cce4412fab2bd8039fef82e618aac61230da1
        },
      },
      {
        path: "patient-management",
        component: () => import("pages/Admin/PatientManagement.vue"),
<<<<<<< HEAD
        meta:{
          requiresAuth: true, role: 'doctor'
=======
        meta: {
          requiresAuth: true,
          role: "doctor",
>>>>>>> 2e1cce4412fab2bd8039fef82e618aac61230da1
        },
      },
      {
        path: "appointment-center",
        name: "appointment-center",
        component: () => import("pages/User/AppointmentCenter.vue"),
<<<<<<< HEAD
        meta:{
          requiresAuth: true, role: 'patient'
=======
        meta: {
          requiresAuth: true,
          role: "patient",
>>>>>>> 2e1cce4412fab2bd8039fef82e618aac61230da1
        },
      },
      {
        path: "add-appointment",
        name: "add-appointment",
        component: () => import("pages/User/AddAppointment.vue"),
<<<<<<< HEAD
        meta:{
          requiresAuth: true, role: 'patient'
=======
        meta: {
          requiresAuth: true,
          role: "patient",
>>>>>>> 2e1cce4412fab2bd8039fef82e618aac61230da1
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
