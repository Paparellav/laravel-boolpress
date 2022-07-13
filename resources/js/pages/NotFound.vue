<template>
    <div class="text-center mt-5">
        <h1>Error 404: Page not found</h1>
        <router-link :to="{ name: 'home' }">
            Come back to Homepage
        </router-link>
    </div>
</template>

<script>
export default {
    name: "NotFound",
};
</script>

<style></style>
