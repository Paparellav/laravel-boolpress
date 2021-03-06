import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Homepage from "./pages/Homepage.vue";
import AboutUs from "./pages/AboutUs.vue";
import Blog from "./pages/Blog.vue";
import SinglePost from "./pages/SinglePost.vue";
import Tags from "./pages/Tags.vue";
import SingleTag from "./pages/SingleTag.vue";
import ContactUs from "./pages/ContactUs.vue";
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
            path: "/blog/:slug",
            name: "single-post",
            component: SinglePost,
        },
        {
            path: "/tags",
            name: "tags",
            component: Tags,
        },
        {
            path: "/tags/:slug",
            name: "single-tag",
            component: SingleTag,
        },
        {
            path: "/contact-us",
            name: "contact-us",
            component: ContactUs,
        },
        {
            path: "/*",
            name: "not_found",
            component: NotFound,
        },
    ],
});

export default router;
