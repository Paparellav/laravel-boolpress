<template>
    <div class="container">
        <section v-if="post">
            <h1>{{ post.title }}</h1>
            <p>Category: {{ checkCategory }}</p>
            <div class="mb-4">
                <router-link
                    :to="{ name: 'single-tag', params: { slug: tag.slug } }"
                    v-for="tag in post.tags"
                    :key="tag.id"
                    class="badge rounded-pill bg-warning text-dark mr-3"
                    >{{ tag.name }}</router-link
                >
            </div>
            <p>
                {{ post.content }}
            </p>
            <router-link :to="{ name: 'blog' }">
                <button class="btn btn-primary">Come back to Post List</button>
            </router-link>
        </section>
        <section v-else>
            <h2 class="text-center">Wait a second please . . .</h2>
        </section>
    </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return {
            post: null,
        };
    },
    mounted() {
        this.getApiCall();
    },
    methods: {
        getApiCall() {
            const slug = this.$route.params.slug;
            axios.get(`/api/posts/${slug}`).then((resp) => {
                if (resp.data.success) {
                    this.post = resp.data.results;
                } else {
                    this.$router.push({ name: "not_found" });
                }
            });
        },
    },
    computed: {
        checkCategory() {
            return this.post.category
                ? this.post.category.name
                : "no categories found";
        },
    },
};
</script>

<style></style>
