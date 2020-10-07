<template>
    <span>
        <span @click="openModal">
            <slot />
        </span>

        <modal
            :show="showAddActivity"
            @close="showAddActivity = false"
            max-width="2xl"
            closeable="true"
        >
            <form @submit.prevent="submitActivity">
                <div class="px-6 py-4">
                    <div class="text-lg">
                        Add Activity
                    </div>

                    <div class="py-4">
                        <div class="mt-4 flex justify-between">
                            <div class="w-1/2 sm:pr-2">
                                <jet-label for="distance" value="Distance" />
                                <jet-input
                                    type="text"
                                    class="mt-1 block w-full"
                                    placeholder="0.00"
                                    ref="distance"
                                    v-model="form.distance"
                                />
                            </div>
                            <div class="w-1/2 sm:pl-2">
                                <jet-label for="finish_time" value="Time" />
                                <jet-input
                                    type="text"
                                    class="mt-1 block w-full"
                                    placeholder="00:00"
                                    ref="finish_time"
                                    v-model="form.finish_time"
                                    v-mask="'##:##'"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-100 text-right">
                    <jet-button
                        :class="{
                            'opacity-25': form.processing,
                            'bg-green-300 border-green-400 hover:bg-green-400 hover:border-green-500': true
                        }"
                        :disabled="form.processing"
                    >
                        Add Activitiy
                    </jet-button>
                </div>
            </form>
        </modal>
    </span>
</template>

<script>
import { mask } from "vue-the-mask";

import Modal from "./../Jetstream/Modal";
import JetLabel from "./../Jetstream/Label";
import JetInput from "./../Jetstream/Input";
import JetButton from "./../Jetstream/Button";
import JetInputError from "./../Jetstream/InputError";

export default {
    components: {
        Modal,
        JetLabel,
        JetInput,
        JetButton,
        JetInputError
    },
    directives: { mask },

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
        },
        openModal() {
            this.showAddActivity = true;
            setTimeout(() => {
                this.$refs.distance.focus();
            }, 150);
        }
    }
};
</script>
