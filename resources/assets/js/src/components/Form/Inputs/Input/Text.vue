<template>
    <div v-show="show" :class="computedWrapperCssClass" :style="computedWrapperCssStyle">
        <slot>
            <validation
                :label="label"
                :id="identity"
                :name="name"
                :show="showValidation"
                :css-class="computedValidationCssClass"
                :validation="validation"
                :error="error"
            ></validation>
        </slot>
        <input
            :type="type"
            :id="identity"
            :name="name"
            :value="value"
            :maxlength="maxlength"
            :placeholder="placeholder"
            :autocomplete="autocomplete"
            :class="inputCssClass"
            v-focus="focus"
            v-on="inputListeners"
            :disabled="isDisabled"
        >
    </div>
</template>
<script>
    import BaseInput from '../BaseInput';
    export default {
        mixins: [BaseInput],
        data() {
            return {
                type: 'text'
            }
        },
        computed: {
            inputListeners() {
                return Object.assign({}, this.$listeners, {
                    input: event => {
                        this.emit(event.target.value);
                    }
                })
            },
        },
        mounted() {
            this.emit(this.currentValue);
            this.initialize();
            this.registerListeners();
        },
        methods: {
            reset() {
                this.emit(this.currentValue);
            },
            clear() {
                this.emit('');
            }
        },
    }
</script>