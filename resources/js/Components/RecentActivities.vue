<template>
    <div class="activities">
        <div
            class="flex flex-row items-center justify-between px-6 sm:px-8 pt-4 pb-6 border-b border-gray-200"
        >
            <div class="text-2xl font-bold">
                Recent Activities

                <span class="block text-gray-400 text-sm">
                    Today, 05 October
                </span>
            </div>
            <div class="add-activity">
                <add-activity>
                    <Button
                        class="bg-green-300 border-green-400 hover:bg-green-400 hover:border-green-500"
                        >Add Activitiy</Button
                    >
                </add-activity>
            </div>
        </div>
        <!-- <div
            class="activities__header flex text-lg font-bold justify-start mb-6 px-6 sm:px-8 py-4 border-b border-gray-200"
        >
            User
        </div> -->
        <ul class="activities__list">
            <li v-for="(activity, index) in activities" :key="activity.id">
                <div
                    class="activity__item flex items-center px-6 sm:px-8 py-4 border-gray-200"
                    :class="index !== activities.length - 1 ? 'border-b' : ''"
                >
                    <div class="user__avatar">
                        <img
                            class="h-12 w-12 mr-4 rounded-full object-cover"
                            :src="activity.user.data.avatar"
                            :alt="activity.user.data.name"
                        />
                    </div>
                    <div
                        class="activity__data text-gray-800 flex flex-auto items-start justify-between"
                    >
                        <div
                            class="user__name text-base font-bold mr-6 leading-tight"
                        >
                            {{ activity.user.data.name }}
                            <div
                                class="activity__type font-medium font-xs text-gray-400"
                            >
                                {{ activity.type }}
                            </div>
                        </div>
                        <div class="activity__distance text-base font-bold">
                            {{ activity.distance }} mi.
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import Button from "./../Jetstream/Button";
import AddActivity from "./AddActivity";

export default {
    components: {
        Button,
        AddActivity
    },
    props: ["activities"]
};
</script>
