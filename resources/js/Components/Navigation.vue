<template>
    <nav class="border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="m-8 p-4">
            <div class="flex flex-col justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <jet-nav-link
                    href="/"
                    :active="$page.currentRouteName == 'dashboard'"
                >
                    Dashboard
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
