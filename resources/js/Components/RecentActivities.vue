<template>
    <div class="activities">
        <div
            class="flex text-xl font-bold justify-start px-6 sm:px-8 py-4 border-b border-gray-200"
        >
            Recent Activities
        </div>
        <ul>
            <li v-for="activity in activities" :key="activity.id">
                <div class="activity__item flex items-center px-6 sm:px-8 py-4 border-b border-gray-200">
                    <div class="user__avatar">
                        <img
                            class="h-12 w-12 mr-4 rounded-full object-cover"
                            :src="activity.user.data.avatar"
                            :alt="activity.user.data.name"
                        />
                    </div>
                    {{ activity.user.data.name }}
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
