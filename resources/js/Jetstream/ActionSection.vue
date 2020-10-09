<template>
    <div class="p-4 py-6">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <slot name="content"></slot>
    </div>
</template>

<script>
import JetSectionTitle from "./SectionTitle";

export default {
    components: {
        JetSectionTitle
    }
};
</script>
