<template>
    <app-layout>
        <ul>
            <li v-for="activity in activities" :key="activity.id">
                {{ activity }}
            </li>
        </ul>
    </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";

export default {
    components: {
        AppLayout
    },
    props: ["activities"]
};
</script>
