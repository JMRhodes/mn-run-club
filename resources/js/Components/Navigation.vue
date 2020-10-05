<template>
    <nav class="w-64 my-10">
        <!-- Primary Navigation Menu -->
        <div class="m-4 py-2">
            <div class="flex flex-col justify-between h-16">
                <!-- Logo -->
                <div class="mb-12">
                    <a href="/" class="flex items-center">
                        <jet-application-mark class="block h-12 w-auto" />
                        <span class="font-black text-xl ml-2">run.club</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <jet-nav-link
                    href="/"
                    :active="$page.currentRouteName == 'dashboard'"
                >
                    <font-awesome-icon :icon="['fas', 'stream']" class="mr-3" />
                    Dashboard
                </jet-nav-link>

                <!-- Navigation Links -->
                <jet-nav-link
                    href="/states"
                    :active="$page.currentRouteName == 'stats'"
                >
                    <font-awesome-icon :icon="['fas', 'chart-bar']" class="mr-3" />
                    Stats
                </jet-nav-link>
            </div>
        </div>
    </nav>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";
import JetApplicationMark from "./../Jetstream/ApplicationMark";
import JetDropdown from "./../Jetstream/Dropdown";
import JetDropdownLink from "./../Jetstream/DropdownLink";
import JetNavLink from "./../Jetstream/NavLink";
import JetResponsiveNavLink from "./../Jetstream/ResponsiveNavLink";

export default {
    components: {
        JetApplicationLogo,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink
    },

    data() {
        return {
            showingNavigationDropdown: false
        };
    }
};
</script>
