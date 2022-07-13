import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Homepage from "./pages/Homepage.vue";
import AboutUs from "./pages/AboutUs.vue";
import Blog from "./pages/Blog.vue";
import NotFound from "./pages/NotFound.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Homepage,
        },
        {
            path: "/about-us",
            name: "about-us",
            component: AboutUs,
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog,
        },
        {
            path: "/*",
            component: NotFound,
        },
    ],
});

export default router;
