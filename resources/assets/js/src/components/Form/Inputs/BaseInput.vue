<script>
    import Error from "../Validator/Error";
    import Helper from '../../../core/Helper';
    import Disabler from '../../../mixins/Disabler';
    import Validation from '../Validator/Validation';
    export default {
        mixins: [Disabler],
        components: {
            'validation': Validation
        },
        props: {
            group: {
                type: String,
                required: false
            },
            label: {
                type: String,
                required: false
            },
            name: {
                type: String,
                required: true
            },
            id: {
                type: String,
                required: false
            },
            value: {
                default: ''
            },
            currentValue: {
                default: ''
            },
            options: {
                type: [Array, Object, String],
                default: () => []
            },
            placeholder: {
                type: String,
                required: false
            },
            focus: {
                type: Boolean,
                default: false
            },
            maxlength: {
                type: String,
                required: false
            },
            autocomplete: {
                type: String,
                required: false
            },
            validation: {
                type: [Array, Object],
                default: () => []
            },
            error: {
                type: Object,
                default: () => new Error
            },
            visible: {
                type: Boolean,
                default: true
            },
            inputCssClass: {
                type: String,
                required: false
            },
            validationCssClass: {
                type: String,
                required: false
            },
            wrapperErrorCssClass: {
                type: String,
                default: 'invalid'
            },
            wrapperErrorCssStyle: {
                type: String,
                required: false
            },
            listen: {
                type: String,
                required: false
            },
            fire: {
                type: String,
                required: false
            }
        },
        data() {
            return {
                identity: this.id ? this.id : this.name,
                displayValidation: false,
                show: this.visible,
            }
        },
        computed: {
            isInvalid() {
                return this.error.has(this.name);
            },
            showValidation() {
                return this.isInvalid && this.displayValidation;
            },
            computedValidationCssClass() {
                return { [this.validationCssClass]: this.isInvalid }
            },
            computedWrapperCssClass() {
                return { [this.wrapperErrorCssClass]: this.isInvalid }
            },
            computedWrapperCssStyle() {
                return { [this.wrapperErrorCssStyle]: this.isInvalid }
            }
        },
        methods: {
            emit(value, event = 'input') {
                this.emitFireEvent(value);
                this.$emit(event, value);
            },
            emitFireEvent(value) {
                if (this.fire) {
                    EventBus.fire(this.fire, value);
                }
            },
            initialize() {

                if (Helper.isEmpty(this.validation)) {
                    return;
                }

                let rules =  this.validation;

                if (!Array.isArray(this.validation)) {
                    this.displayValidation = true;
                    rules = Object.keys(this.validation);
                }

                EventBus.fire('initialize-' + this.group, {
                    field: this.name,
                    rules: rules
                });
            },
            registerListeners() {
                EventBus.listen('reset-form-' + this.group, this.reset);
                EventBus.listen('clear-form-' + this.group, this.clear);
            },
            reset() {
                console.log('Please provide reset method implementation for ' + this.name);
            },
            clear() {
                console.log('Please provide clear method implementation for ' + this.name);
            },
            optionId(option) {
                if (option.id) {
                    return option.id;
                }
                return this.name + '-' + option.value;
            }
        },
        watch: {
            disabled(isDisabled) {
                if (isDisabled) {
                    this.disable();
                } else {
                    this.enable();
                }
            }
        }
    }
</script>