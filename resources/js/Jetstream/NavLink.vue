<template>
    <inertia-link :href="href" class="inline-flex items-center mx-4 px-2 pt-4 pb-2 font-bold leading-5 text-blue-800 hover:text-primary hover:border-primary transition duration-150 ease-in-out border-b-4 border-white" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ["href", "active"],

    computed: {
        classes() {
            return this.active
                ? "border-secondary"
                : "";
        }
    }
};
</script>
