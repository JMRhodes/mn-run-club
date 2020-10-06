<template>
    <span>
        <span @click="startAddActivity">
            <slot />
        </span>

        <jet-dialog-modal :show="addActivity" @close="addActivity = false">
            <template #title>
                {{ title }}
            </template>

            <template #content>
                {{ content }}

                <div class="mt-4">
                    <jet-input
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Distance"
                        ref="password"
                        v-model="form.password"
                        @keyup.enter.native="confirmPassword"
                    />

                    <jet-input-error :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <Button
                    class="bg-green-300 border-green-400 hover:bg-green-400 hover:border-green-500"
                    >Add Activitiy</Button
                >
            </template>
        </jet-dialog-modal>
    </span>
</template>

<script>
import Button from "./../Jetstream/Button";
import JetDialogModal from "./../Jetstream/DialogModal";
import JetInput from "./../Jetstream/Input";
import JetInputError from "./../Jetstream/InputError";
import JetSecondaryButton from "./../Jetstream/SecondaryButton";

export default {
    props: {
        title: {
            default: "Add Activity"
        },
        content: {
            default:
                "Add your activity details below."
        },
        button: {
            default: "Confirm"
        }
    },

    components: {
        Button,
        JetDialogModal,
        JetInput,
        JetInputError,
        JetSecondaryButton
    },

    data() {
        return {
            addActivity: false,

            form: this.$inertia.form(
                {
                    password: "",
                    error: ""
                },
                {
                    bag: "confirmPassword"
                }
            )
        };
    },

    methods: {
        startAddActivity() {
            this.form.error = "";

            axios.get("/user/confirmed-password-status").then(response => {
                if (response.data.confirmed) {
                    this.$emit("confirmed");
                } else {
                    this.addActivity = true;
                    this.form.password = "";

                    setTimeout(() => {
                        this.$refs.password.focus();
                    }, 250);
                }
            });
        },

        confirmPassword() {
            this.form.processing = true;

            axios
                .post("/user/confirm-password", {
                    password: this.form.password
                })
                .then(response => {
                    this.addActivity = false;
                    this.form.password = "";
                    this.form.error = "";
                    this.form.processing = false;

                    this.$nextTick(() => this.$emit("confirmed"));
                })
                .catch(error => {
                    this.form.processing = false;
                    this.form.error = error.response.data.errors.password[0];
                });
        }
    }
};
</script>
