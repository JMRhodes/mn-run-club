<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ["href", "active"],

    computed: {
        classes() {
            return this.active
                ? "inline-flex items-center px-6 py-4 font-bold leading-5 bg-gray-800 text-white rounded-lg transition duration-150 ease-in-out mb-4"
                : "inline-flex items-center px-6 py-4 font-bold leading-5 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition duration-150 ease-in-out mb-4";
        }
    }
};
</script>
