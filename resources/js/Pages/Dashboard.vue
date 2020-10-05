<template>
    <app-layout>
        <RecentActivities :activities="activities" />
    </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import RecentActivities from "./../Components/RecentActivities";

export default {
    components: {
        AppLayout,
        RecentActivities
    },
    props: ["activities"]
};
</script>
