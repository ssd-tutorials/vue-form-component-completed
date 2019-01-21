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
        <select
            :id="identity"
            :name="name"
            :disabled="isDisabled"
            :autocomplete="autocomplete"
            :class="inputCssClass"
            v-focus="focus"
            v-model="selected"
            @change="update"
            multiple
        >
            <option v-if="placeholder" v-text="placeholder" value></option>
            <option
                v-for="option in options"
                :key="option.value"
                :value="option.value"
                v-text="option.name"
            ></option>
        </select>
    </div>
</template>
<script>
    import MultiSelectInput from '../MultiSelectInput';
    export default {
        mixins: [MultiSelectInput],
        mounted() {
            this.update();
            this.initialize();
            this.registerListeners();
        },
        methods: {
            update() {
                this.emit(this.selected);
            }
        }
    }
</script>