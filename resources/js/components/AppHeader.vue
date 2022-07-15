<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand" href="#">Boolpress</span>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                :to="{ name: 'home' }"
                            >
                                Home
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                :to="{ name: 'about-us' }"
                            >
                                About us
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                :to="{ name: 'blog' }"
                            >
                                Blog
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                :to="{ name: 'tags' }"
                            >
                                Tags
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link active"
                                aria-current="page"
                                :to="{ name: 'contact-us' }"
                            >
                                Contact us
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {};
</script>

<style></style>
