<template>
    <div class="container">
        <ul>
            <li v-for="item in tags" :key="item.id">
                <router-link
                    :to="{ name: 'single-tag', params: { slug: item.slug } }"
                    class="badge rounded-pill bg-warning text-dark mr-3"
                >
                    {{ item.name }}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "TagsList",
    data() {
        return {
            tags: [],
        };
    },
    mounted() {
        this.getApiCall();
    },
    methods: {
        getApiCall() {
            axios.get("/api/tags").then((resp) => {
                this.tags = resp.data.results;
            });
        },
    },
};
</script>

<style></style>
