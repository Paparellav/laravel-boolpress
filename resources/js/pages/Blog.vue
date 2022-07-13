<template>
    <div class="container">
        <h2 class="text-center">My Blog</h2>
        <PostList />
    </div>
</template>

<script>
import PostList from "../components/PostList.vue";

export default {
    name: "Blog",
    components: {
        PostList,
    },
};
</script>

<style></style>
