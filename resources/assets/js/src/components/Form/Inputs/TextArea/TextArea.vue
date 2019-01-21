<template>
    <div v-show="show" :class="computedWrapperCssClass" :style="computedWrapperCssStyle">
        <slot name="validation">
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
        <textarea
            :id="identity"
            :name="name"
            :disabled="isDisabled"
            :maxlength="maxlength"
            :placeholder="placeholder"
            :autocomplete="autocomplete"
            :class="inputCssClass"
            :style="inputCssStyle"
            v-focus="focus"
            v-on="inputListeners"
            v-model="body"
        ></textarea>
    </div>
</template>
<script>
    import BaseInput from '../BaseInput';
    export default {
        mixins: [BaseInput],
        props: {
            height: {
                type: String,
                default: '7rem'
            }
        },
        data() {
            return {
                currentBody: this.$slots.body ? this.$slots.body[0].children[0].text : '',
                body: ''
            }
        },
        computed: {
            inputListeners() {
                return Object.assign({}, this.$listeners, {
                    input: () => {
                        this.emit(this.body);
                    }
                })
            },
            inputCssStyle() {
                return {
                    height: this.height
                }
            }
        },
        mounted() {
            this.reset();
            this.initialize();
            this.registerListeners();
        },
        methods: {
            reset() {
                this.emit(this.body = this.currentBody);
            },
            clear() {
                this.emit(this.body = '');
            }
        }
    }
</script>