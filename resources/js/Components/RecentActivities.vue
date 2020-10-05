<template>
    <div class="activities">
        <div
            class="flex text-xl font-bold justify-start px-6 sm:px-8 py-4 border-b border-gray-200"
        >
            Recent Activities
        </div>
        <ul>
            <li v-for="activity in activities" :key="activity.id">
                <div class="activity__item px-6 sm:px-8 py-4 border-b border-gray-200">
                    {{ activity }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ["activities"]
};
</script>
