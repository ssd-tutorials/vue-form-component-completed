<template>
    <div v-show="show" class="checkbox-group-item" :class="computedWrapperCssClass" :style="computedWrapperCssStyle">
        <input
            type="checkbox"
            :id="identity"
            :name="name"
            :disabled="isDisabled"
            :autocomplete="autocomplete"
            :indeterminate.prop="indeterminate"
            :class="inputCssClass"
            v-model="checked"
            @change="update"
        >
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
    </div>
</template>
<script>
    import BaseInput from '../../BaseInput';
    import MultiHandler from '../../../../../mixins/MultiHandler';
    export default {
        mixins: [BaseInput, MultiHandler],
        props: {
            total: {
                type: Number,
                required: true
            },
            fire: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                checked: false,
                indeterminate: false,
            }
        },
        methods: {
            evaluate() {
                const length = this.items.length;
                this.checked = length === this.total;
                this.indeterminate = length > 0 && length < this.total;
            },
            update() {
                EventBus.fire(this.fire, this.checked);
            }
        }
    }
</script>