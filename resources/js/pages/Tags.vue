<template>
    <div class="container">
        <h2 class="text-center">Tags List</h2>
        <TagsList />
    </div>
</template>

<script>
import TagsList from "../components/TagsList.vue";

export default {
    name: "Tags",
    components: {
        TagsList,
    },
};
</script>

<style></style>
