<template>
    <div class="container">
        <section v-if="tag">
            <h1>Tag: {{ tag.name }}</h1>
            <h3 class="my-5">Post collegati:</h3>
            <div class="row row-cols-3">
                <!-- Single Card -->
                <div v-for="item in tag.posts" :key="item.id" class="col">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ item.title }}</h5>
                            <p>{{ truncateContent(item.content, 300) }}</p>
                            <router-link
                                :to="{
                                    name: 'single-post',
                                    params: { slug: item.slug },
                                }"
                                class="card-link"
                                >Read post</router-link
                            >
                        </div>
                    </div>
                </div>
                <!-- Single Card -->
            </div>
            <router-link :to="{ name: 'tags' }">
                <button class="btn btn-primary">Come back to Tags List</button>
            </router-link>
        </section>
        <section v-else>Waiting a second . . .</section>
    </div>
</template>

<script>
export default {
    name: "SingleTag",
    data() {
        return {
            tag: null,
        };
    },
    mounted() {
        this.getApiCall();
    },
    methods: {
        getApiCall() {
            const slug = this.$route.params.slug;
            axios.get(`/api/tags/${slug}`).then((resp) => {
                if (resp.data.success) {
                    this.tag = resp.data.results;
                } else {
                    this.$router.push({ name: "not_found" });
                }
            });
        },
        truncateContent(content, maxChar) {
            if (content.length > maxChar) {
                return content.substr(0, maxChar) + "...";
            }
            return content;
        },
    },
};
</script>

<style></style>
