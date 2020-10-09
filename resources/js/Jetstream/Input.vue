<template>
    <input class="w-full font-medium form-input px-4 text-xl w-full rounded border-2 border-blue-900" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

