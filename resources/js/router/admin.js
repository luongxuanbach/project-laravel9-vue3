const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/Admin.vue"),
        children: [
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/Index.vue")
            },
            {
                path: "roles",
                name: "admin-roles",
                component: () => import("../pages/admin/roles/Index.vue")
            },
            {
                path: "settings",
                name: "admin-settings",
                component: () => import("../pages/admin/settings/Index.vue")
            }
        ]
    }
]

export default admin;