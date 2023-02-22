const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/Admin.vue"),
        children: [
            // Manager Users
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/Index.vue")
            },
            {
                path: "users/create",
                name: "admin-users-create",
                component: () => import("../pages/admin/users/Create.vue")
            },
            // Manager Roles
            {
                path: "roles",
                name: "admin-roles",
                component: () => import("../pages/admin/roles/Index.vue")
            },
            // Manager Settings
            {
                path: "settings",
                name: "admin-settings",
                component: () => import("../pages/admin/settings/Index.vue")
            }
        ]
    }
]

export default admin;