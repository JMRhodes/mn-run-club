<template>
    <div>
        <button
            v-if="linkType === 'button'"
            type="submit"
            class="block w-full font-medium px-4 py-2 text-sm leading-5 text-blue-800 text-left hover:bg-secondary focus:outline-none focus:bg-secondary transition duration-150 ease-in-out"
        >
            <slot></slot>
        </button>

        <inertia-link
            :href="href"
            class="block font-medium w-full px-4 py-2 text-sm leading-5 text-blue-800 text-left hover:bg-primary focus:outline-none focus:bg-primary transition duration-150 ease-in-out"
            v-else
        >
            <slot></slot>
        </inertia-link>
    </div>
</template>

<script>
export default {
    props: ["href", "linkType"]
};
</script>
