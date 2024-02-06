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
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "admin-dashboard",
        name: "admin-dashboard",
        component: () => import("pages/Admin/Dashboard.vue"),
      },
      {
        path: "patient-management",
        component: () => import("pages/Admin/PatientManagement.vue"),
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
