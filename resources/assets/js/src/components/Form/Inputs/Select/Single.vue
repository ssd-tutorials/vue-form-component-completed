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
        >
            <option v-if="placeholder" v-text="placeholder" value></option>
            <option
                v-for="option in records"
                :key="option.value"
                :value="option.value"
                v-text="option.name"
            ></option>
        </select>
    </div>
</template>
<script>
    import BaseInput from '../BaseInput';
    import Helper from "../../../../core/Helper";
    import AjaxCaller from '../../../../mixins/AjaxCaller';
    export default {
        mixins: [BaseInput, AjaxCaller],
        props: {
            dependsOn: {
                type: [Number, String],
                required: false
            },
            fields: {
                type: Object,
                default: () => { return {} }
            },
            isLast: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                selected: this.currentValue,
                records: [],
            }
        },
        computed: {
            endPoint() {
                return this.options;
            },
            requestData() {
                return {
                    id: this.name,
                    items: Object.assign(this.fields, {
                        [this.name]: this.selected
                    })
                }
            }
        },
        mounted() {
            this.fetch();
            this.emit(this.selected);
            this.initialize();
            this.registerListeners();
        },
        methods: {
            fetch() {
                if (Helper.isObject(this.options)) {
                    this.records = this.options[this.dependsOn];
                    return;
                }
                if (typeof this.options === 'string') {
                    this.fetchAjax();
                    return;
                }
                this.records = this.options;
            },
            fetchAjax() {
                if (this.isDisabled) {
                    return;
                }
                this.makeAjaxCall(this.callSuccessful, this.callFailed);
            },
            callSuccessful(response) {
                this.stopProcessingAjaxCall();
                this.records = response.data.records;
                if (response.data.summary) {
                    EventBus.fire('update-summary-' + this.group, response.data.summary);
                }
            },
            callFailed(error) {
                ErrorHandler.showError(error, this.stopProcessingAjaxCall);
            },
            reset() {
                if (this.currentValue) {
                    this.emit(this.selected = this.currentValue);
                    return;
                }
                this.clear();
            },
            clear() {
                this.emit(this.selected = '');
            },
            update() {
                this.emit(this.selected);
                if (this.isLast) {
                    this.fetch();
                }
            }
        },
        watch: {
            dependsOn(value) {
                this.selected = '';
                if (!value) {
                    this.disable();
                } else {
                    this.enable();
                    this.fetch();
                }
                this.emit(this.selected);
            }
        }
    }
</script>