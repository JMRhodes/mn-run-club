<template>
    <!-- Primary Navigation Menu -->
    <div class="flex w-full px-4 items-stretch justify-between">
        <div class="flex w-full justify-start items-stretch h-16">
            <!-- Logo -->
            <a href="/" class="flex items-center md:mr-12">
                <jet-application-mark class="block h-10 w-auto" />
                <span class="font-bold text-2xl ml-2">run.club</span>
            </a>

            <!-- Navigation Links -->
            <jet-nav-link
                href="/"
                :active="$page.currentRouteName == 'dashboard'"
            >
                Dashboard
            </jet-nav-link>
        </div>

        <profile-actions />
    </div>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";
import JetApplicationMark from "./../Jetstream/ApplicationMark";
import JetDropdown from "./../Jetstream/Dropdown";
import JetDropdownLink from "./../Jetstream/DropdownLink";
import JetNavLink from "./../Jetstream/NavLink";
import JetResponsiveNavLink from "./../Jetstream/ResponsiveNavLink";
import ProfileActions from "./../Components/ProfileActions";

export default {
    components: {
        JetApplicationLogo,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        ProfileActions
    },

    data() {
        return {
            showingNavigationDropdown: false
        };
    }
};
</script>
