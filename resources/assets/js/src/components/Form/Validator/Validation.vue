<template>
    <label :for="id" v-if="showLabel">
        <span v-if="label" v-text="label"></span>
        <span class="validation" v-show="show">
            <span
                :class="cssClass"
                v-for="(message, rule) in validation"
                v-show="showError(rule)"
                v-text="message"
            ></span>
        </span>
    </label>
</template>
<script>
    import Error from "./Error";
    export default {
        props: {
            label: {
                type: String,
                required: false
            },
            id: {
                type: String,
                required: true
            },
            name: {
                type: String,
                required: true
            },
            show: {
                type: Boolean,
                default: false
            },
            cssClass: {
                type: [Array, Object, String],
                required: false
            },
            validation: {
                type: [Array, Object],
                default: () => []
            },
            error: {
                type: Object,
                default: () => new Error
            }
        },
        computed: {
            showLabel() {
                return this.label || this.show;
            }
        },
        methods: {
            showError(rule) {
                return this.error.has(this.name, rule.split(':')[0]);
            }
        }
    }
</script>