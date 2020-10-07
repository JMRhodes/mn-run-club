<template>
    <span>
        <span @click="showAddActivity = true">
            <slot />
        </span>

        <modal
            :show="showAddActivity"
            @close="showAddActivity = false"
            max-width="xl"
        >
            <form @submit.prevent="submitActivity">
                <div class="px-6 py-4">
                    <div class="text-lg">
                        Add Activity
                    </div>

                    <div class="py-4">
                        <div class="w-1/2 sm:pr-2 mb-4">
                            <jet-label for="date" value="Date" />
                            <v-date-picker
                                v-model="form.date"
                                :popover="{ placement: 'bottom', visibility: 'click' }"
                                locale="us-EN"
                                :max-date="new Date()"
                                :masks="{
                                    input: 'MMMM D, YYYY',
                                    data: 'YYYY-MM-DD'
                                }"
                                :input-props="{
                                    class: 'form-input text-lg rounded-lg px-6'
                                }"
                            />
                        </div>
                        <div class="w-full mb-4">
                            <jet-label for="type" value="Type" />
                            <jet-input
                                type="hidden"
                                ref="type"
                                v-model="form.type"
                            />
                            <div class="add-activity__types flex mt-1">
                                <a
                                    v-for="(type, index) in types"
                                    :key="index"
                                    class="add-activity__type bg-gray-100 h-16 w-16 rounded-md flex items-center justify-center p-2 mr-4"
                                    :class="type.icon"
                                    ref="typeIcons"
                                    @click="setActivityType(type.name, index)"
                                >
                                    <font-awesome-icon
                                        :icon="['fas', type.icon]"
                                        class="block w-full"
                                        size="2x"
                                    />
                                </a>
                            </div>
                        </div>
                        <div class="mb-4 flex justify-between">
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
            types: [
                {
                    name: "run",
                    icon: "running"
                },
                {
                    name: "walk",
                    icon: "walking"
                },
                {
                    name: "bike",
                    icon: "biking"
                }
            ],
            form: this.$inertia.form(
                {
                    _method: "POST",
                    user_id: this.userId,
                    date: new Date(),
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
            this.form.date = moment(this.form.date)
                .format("YYYY-MM-DD HH:mm:ss")
                .toString();
            this.form
                .post("/api/activity", {
                    preserveScroll: true
                })
                .then(() => {
                    this.showAddActivity = false;
                });
        },
        setActivityType(selected, index) {
            this.form.type = selected;
            for (let i = 0; i < this.$refs.typeIcons.length; i++) {
                this.$refs.typeIcons[i].classList.remove("active");
            }
            this.$refs.typeIcons[index].classList.add("active");
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

<style lang="scss">
.add-activity {
    &__type {
        cursor: pointer;

        &.active {
            @apply bg-gray-300;
        }
    }
}
</style>
