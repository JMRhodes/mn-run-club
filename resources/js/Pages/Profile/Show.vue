<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <update-profile-information-form
            :name="$page.user.name"
            :display="$page.user.display"
            :email="$page.user.email"
        />

        <jet-section-border />

        <update-password-form class="mt-10 sm:mt-0" />

        <!-- <div v-if="$page.jetstream.canManageTwoFactorAuthentication">
            <jet-section-border />

            <two-factor-authentication-form class="mt-10 sm:mt-0" />
        </div> -->

        <jet-section-border />

        <logout-other-browser-sessions-form
            :sessions="sessions"
            class="mt-10 sm:mt-0"
        />

        <jet-section-border />

        <delete-user-form class="mt-10 sm:mt-0" />
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import DeleteUserForm from "./DeleteUserForm";
import JetSectionBorder from "./../../Jetstream/SectionBorder";
import LogoutOtherBrowserSessionsForm from "./LogoutOtherBrowserSessionsForm";
import TwoFactorAuthenticationForm from "./TwoFactorAuthenticationForm";
import UpdatePasswordForm from "./UpdatePasswordForm";
import UpdateProfileInformationForm from "./UpdateProfileInformationForm";

export default {
    props: ["sessions"],

    components: {
        AppLayout,
        DeleteUserForm,
        JetSectionBorder,
        LogoutOtherBrowserSessionsForm,
        TwoFactorAuthenticationForm,
        UpdatePasswordForm,
        UpdateProfileInformationForm
    }
};
</script>
