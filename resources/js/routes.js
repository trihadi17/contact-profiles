export const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("./Pages/Home.vue"),
    },
    {
        path: "/create",
        name: "create",
        component: () => import("./Pages/Create.vue"),
    },
    {
        path: "/edit/:id",
        name: "edit",
        component: () => import("./Pages/Edit.vue"),
    },
    {
        path: "/show/:id",
        name: "show",
        component: () => import("./Pages/Show.vue"),
    },
];
