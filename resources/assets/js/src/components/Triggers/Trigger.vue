<script>
    import Disabler from '../../mixins/Disabler';
    import Processor from '../../mixins/Processor';
    export default {
        mixins: [Disabler, Processor],
        props: {
            group: {
                type: String,
                required: true,
            },
            name: {
                type: String,
                default: 'items',
            },
            alwaysEnabled: {
                type: Boolean,
                default: false
            }
        },
        created() {
            EventBus.listen('disable-started-' + this.group, this.disable);
            EventBus.listen('disable-ended-' + this.group, this.enable);
        },
        methods: {
            conditionalTrigger() {
                if (this.isDisabled && !this.alwaysEnabled) {
                    return;
                }
                this.trigger();
            },
            trigger() {
                console.log('Please implement trigger method');
            }
        },
        render() {
            return this.$scopedSlots.default({
                isDisabled: this.isDisabled,
                processing: this.processing,
                trigger: this.conditionalTrigger
            });
        }
    }
</script>