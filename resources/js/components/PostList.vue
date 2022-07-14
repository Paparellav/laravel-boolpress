<template>
    <div>
        <div class="container">
            <h2 class="mt-5 mb-3 text-center">Post List</h2>
            <h4 class="text-center mt-3 mb-5">
                Post trovati: {{ totalPosts }}
            </h4>
            <div class="row row-cols-2">
                <!-- Single Card -->
                <div v-for="item in posts" :key="item.id" class="col">
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
            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="...">
                    <ul class="pagination">
                        <!-- Previos page button -->
                        <li
                            class="page-item"
                            :class="{ disabled: currentPage === 1 }"
                        >
                            <a
                                @click="getApiCall(currentPage - 1)"
                                class="page-link"
                                href="#"
                                tabindex="-1"
                                >Previous</a
                            >
                        </li>
                        <!-- Pages numbers -->
                        <li
                            v-for="n in lastPage"
                            :key="n"
                            class="page-item"
                            :class="{ active: currentPage === n }"
                        >
                            <a
                                @click="getApiCall(n)"
                                class="page-link"
                                href="#"
                                >{{ n }}</a
                            >
                        </li>
                        <!-- Next page button -->
                        <li
                            class="page-item"
                            :class="{ disabled: currentPage === lastPage }"
                        >
                            <a
                                @click="getApiCall(currentPage + 1)"
                                class="page-link"
                                href="#"
                                >Next</a
                            >
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostList",
    data() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: 0,
            totalPosts: 0,
        };
    },
    created() {
        this.getApiCall(1);
    },
    methods: {
        getApiCall(numbOfPages) {
            axios
                .get("/api/posts", {
                    params: {
                        page: numbOfPages,
                    },
                })
                .then((resp) => {
                    this.posts = resp.data.results.data;
                    this.currentPage = resp.data.results.current_page;
                    this.lastPage = resp.data.results.last_page;
                    this.totalPosts = resp.data.results.total;
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
