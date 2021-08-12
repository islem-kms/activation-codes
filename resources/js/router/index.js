import {createWebHistory, createRouter} from "vue-router";
import Hospitals from "../components/Hospitals";

export const routes = [
    {
        name: 'hospitals',
        path: '/hospitals',
        component: Hospitals
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
