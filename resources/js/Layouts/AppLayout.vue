<template>
    <div class="app min-h-screen bg-gray-100">
        <navigation />

        <!-- Page Content -->
        <main class="drawer--main w-1/2 bg-white py-12  pb-4 my-8">
            <slot></slot>
        </main>

        <!-- Page Content -->
        <aside class="drawer--secondary p-8 my-10">
            <profile-actions/>
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
        border-radius: 2rem;
    }
}
</style>
