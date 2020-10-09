<template>
    <div class="p-4 py-6">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div>
            <form @submit.prevent="$emit('submitted')">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="mb-3">
                        <slot name="form"></slot>
                    </div>

                    <div
                        class="flex flex-col items-center justify-start bg-gray-50 text-right"
                        v-if="hasActions"
                    >
                        <slot name="actions"></slot>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import JetSectionTitle from "./SectionTitle";

export default {
    components: {
        JetSectionTitle
    },

    computed: {
        hasActions() {
            return !!this.$slots.actions;
        }
    }
};
</script>
