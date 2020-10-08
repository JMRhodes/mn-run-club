<template>
    <!-- Settings Dropdown -->
    <div class="w-64">
        <div class="relative">
            <jet-dropdown align="left" width="48">
                <template #trigger>
                    <button
                        v-if="$page.jetstream.managesProfilePhotos"
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out items-center"
                    >
                        <img
                            class="h-10 w-10 rounded-full object-cover"
                            :src="$page.user.profile_photo_url"
                            :alt="$page.user.name"
                        />

                        <span class="text-gray-800 text-lg font-bold ml-4 leading-snug text-left"
                            >Hello,
                            {{
                                $page.user.display
                                    ? $page.user.display
                                    : $page.user.name
                            }}!
                            <div class="block font-medium text-sm text-gray-400">Level: <span class="font-bold text-orange-400">Beginner</span></div>
                        </span>
                    </button>

                    <button
                        v-else
                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                    >
                        <div>{{ $page.user.name }}</div>

                        <div class="ml-1">
                            <svg
                                class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
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

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                        <jet-dropdown-link as="button">
                            Logout
                        </jet-dropdown-link>
                    </form>
                </template>
            </jet-dropdown>
        </div>
    </div>
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
