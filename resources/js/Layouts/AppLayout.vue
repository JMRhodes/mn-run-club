<template>
    <div class="app bg-white min-h-screen flex-col flex">
        <nav class="w-full border-b-2 border-blue-900">
            <primary-navigation />
        </nav>
        <div class="page flex flex-1">
            <!-- Page Content -->
            <main class="drawer--main w-1/2 border-r-2 border-blue-900">
                <slot></slot>
            </main>

            <!-- Page Content -->
            <aside class="drawer--secondary">
                <add-activity :userId="$page.user.id">
                    <jet-button>Add Activitiy</jet-button>
                </add-activity>
            </aside>

            <!-- Modal Portal -->
            <portal-target name="modal" multiple> </portal-target>
        </div>
    </div>
</template>

<script>
import JetButton from "./../Jetstream/Button";
import PrimaryNavigation from "./../Components/PrimaryNavigation";
import AddActivity from "./../Components/AddActivity";

export default {
    components: {
        JetButton,
        PrimaryNavigation,
        AddActivity
    },

    computed: {
        path() {
            return window.location.pathname;
        }
    }
};
</script>
