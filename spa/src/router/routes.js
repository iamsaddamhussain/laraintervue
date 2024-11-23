import { useAuthStore } from "src/stores/authStore";

const redirectToHomeOnLoggedIn = (to, from, next) => {
  if (useAuthStore().isLoggedIn) next({ name: "dashboard" });
  else next();
};

const routes = [
  {
    path: "/",
    component: () => import("layouts/MainLayout.vue"),
    children: [
      {
        path: "",
        name: "dashboard",
        component: () => import("src/pages/DashBoard.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "profile",
        name: "profile",
        component: () => import("src/pages/ProfilePage.vue"),
        meta: { requireAuth: true },
      },
      ////////////////////////////////////////////////////////////
      // User Managment//
      ////////////////////////////////////////////////////////////
      {
        path: "users",
        name: "users",
        component: () => import("src/pages/UsersPage.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "create-users",
        name: "create_users",
        component: () => import("src/pages/UsersForm.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "edit-user/:id",
        name: "edit_user",
        component: () => import("src/pages/UsersForm.vue"),
        props: true,
        meta: { requireAuth: true },
      },
      ////////////////////////////////////////////////////////////
      // Role Managment//
      ////////////////////////////////////////////////////////////
      {
        path: "roles",
        name: "roles",
        component: () => import("src/pages/Roles.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "create-roles",
        name: "create_roles",
        component: () => import("src/pages/RoleForm.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "edit-roles/:id",
        name: "edit_roles",
        component: () => import("src/pages/RoleForm.vue"),
        props: true,
        meta: { requireAuth: true },
      },
      ///////////////////////////////////////////////////////////
      // Permission Managment//
      ////////////////////////////////////////////////////////////
      {
        path: "permissions",
        name: "permissions",
        component: () => import("src/pages/Permissions.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "create-permissions",
        name: "create_permissions",
        component: () => import("src/pages/PermissionFormPage.vue"),
        meta: { requireAuth: true },
      },
      {
        path: "edit-permission/:id",
        name: "edit_permission",
        component: () => import("src/pages/PermissionFormPage.vue"),
        props: true,
        meta: { requireAuth: true },
      },
    ],
  },
  {
    path: "/auth",
    component: () => import("layouts/BlankLayout.vue"),
    children: [
      {
        path: "login",
        name: "login",
        component: () => import("src/pages/LoginPage.vue"),
        beforeEnter: redirectToHomeOnLoggedIn,
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
