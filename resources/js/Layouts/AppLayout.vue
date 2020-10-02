<template>
    <div class="app min-h-screen bg-gray-100">
        <Navigation />

        <!-- Page Content -->
        <main class="drawer--main bg-white p-8 m-4">
            <slot></slot>
        </main>

        <!-- Page Content -->
        <aside class="drawer--secondary p-4 mt-8">
            <ProfileActions/>
        </aside>

        <!-- Modal Portal -->
        <portal-target name="modal" multiple> </portal-target>
    </div>
</template>

<script>
import Navigation from "./../Components/Navigation";
import ProfileActions from "./../Components/ProfileActions";

export default {
    components: {
        Navigation,
        ProfileActions
    },

    methods: {
        logout() {
            axios.post("/logout").then(response => {
                window.location = "/";
            });
        }
    },

    computed: {
        path() {
            return window.location.pathname;
        }
    }
};
</script>

<style lang="scss" scoped>
.app {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    align-content: stretch;
}
.drawer {
    &--main {
        flex: 1;
        border-radius: 50px;
    }
}
</style>
