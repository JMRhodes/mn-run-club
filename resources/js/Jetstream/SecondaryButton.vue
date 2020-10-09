<template>
    <button :type="type" class="block w-full bg-tertiary rounded p-4 py-2 font-bold transition ease-in-out duration-150">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    }
</script>
