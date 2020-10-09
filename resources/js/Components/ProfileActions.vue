<template>
    <!-- Settings Dropdown -->
    <jet-dropdown class="w-64 justify-end" align="right" width="48">
        <template #trigger>
            <button
                v-if="$page.jetstream.managesProfilePhotos"
                class="flex text-sm focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out items-center"
            >
                <span
                    class="text-gray-800 text-base font-bold mr-4 leading-snug text-right"
                    >Hello,
                    {{
                        $page.user.display
                            ? $page.user.display
                            : $page.user.name
                    }}!
                    <div class="block font-medium text-xs text-gray-400">
                        Level:
                        <span class="font-bold text-secondary">Beginner</span>
                    </div>
                </span>
                <img
                    class="h-10 w-10 rounded-full object-cover"
                    :src="$page.user.profile_photo_url"
                    :alt="$page.user.name"
                />
            </button>
        </template>

        <template #content>
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                Manage Account
            </div>

            <jet-dropdown-link href="/user/profile">
                Profile
            </jet-dropdown-link>

            <jet-dropdown-link
                href="/user/api-tokens"
                v-if="$page.jetstream.hasApiFeatures"
            >
                API Tokens
            </jet-dropdown-link>

            <div class="border-t-2 border-blue-900"></div>

            <!-- Authentication -->
            <form @submit.prevent="logout">
                <jet-dropdown-link as="button" class="hover:bg-secondary focus:bg-secondary">
                    Logout
                </jet-dropdown-link>
            </form>
        </template>
    </jet-dropdown>
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

    methods: {
        logout() {
            axios.post("/logout").then(response => {
                window.location = "/";
            });
        }
    },

    data() {
        return {
            showingNavigationDropdown: false
        };
    }
};
</script>
