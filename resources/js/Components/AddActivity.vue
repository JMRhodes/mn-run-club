<template>
    <span>
        <span @click="showAddActivity = true">
            <slot />
        </span>

        <jet-dialog-modal
            :show="showAddActivity"
            @close="showAddActivity = false"
        >
            <template #title> Add Activity</template>

            <template #content>
                <form @submit.prevent="submitActivity">
                    <div class="mt-4 flex justify-between">
                        <div class="w-1/2 sm:pr-2">
                            <jet-label for="distance" value="Distance" />
                            <jet-input
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="Distance"
                                ref="distance"
                                v-model="form.distance"
                            />
                        </div>
                        <div class="w-1/2 sm:pl-2">
                            <jet-label for="finish_time" value="finish_time" />
                            <jet-input
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="Time"
                                ref="finish_time"
                                v-model="form.finish_time"
                            />
                        </div>
                    </div>
                    <jet-button
                        :class="{
                            'opacity-25': form.processing,
                            'bg-green-300 border-green-400 hover:bg-green-400 hover:border-green-500': true
                        }"
                        :disabled="form.processing"
                    >
                        Add Activitiy
                    </jet-button>
                </form>
            </template>

            <template #footer> </template>
        </jet-dialog-modal>
    </span>
</template>

<script>
import Button from "./../Jetstream/Button";
import JetDialogModal from "./../Jetstream/DialogModal";
import JetLabel from "./../Jetstream/Label";
import JetInput from "./../Jetstream/Input";
import JetButton from "./../Jetstream/Button";
import JetInputError from "./../Jetstream/InputError";
import JetSecondaryButton from "./../Jetstream/SecondaryButton";

export default {
    components: {
        Button,
        JetDialogModal,
        JetLabel,
        JetInput,
        JetButton,
        JetInputError,
        JetSecondaryButton
    },

    props: ["userId", "date", "type", "distance", "finish_time"],

    data() {
        return {
            showAddActivity: false,
            form: this.$inertia.form(
                {
                    _method: "POST",
                    user_id: this.userId,
                    date: "2020-10-04",
                    type: "run",
                    rating: 5,
                    distance: this.distance,
                    finish_time: this.finish_time
                },
                {
                    bag: "submitActivity",
                    resetOnSuccess: true
                }
            )
        };
    },

    methods: {
        submitActivity() {
            this.form
                .post("/api/activity", {
                    preserveScroll: true
                })
                .then(() => {
                    this.showAddActivity = false;
                });
        }
    }
};
</script>
