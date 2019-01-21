<script>
    export default {
        props: {
            disabled: {
                type: Boolean,
                default: false,
            }
        },
        data() {
            return {
                isDisabled: this.disabled
            }
        },
        methods: {
            enable() {
                this.isDisabled = false;
            },
            disable() {
                this.isDisabled = true;
            }
        }
    }
</script>