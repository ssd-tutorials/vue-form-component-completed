<script>
    import Trigger from './Trigger';
    export default {
        mixins: [Trigger],
        props: {
            fire: {
                type: String,
                required: true,
            },
        },
        created() {
            EventBus.listen('submission-started-' + this.group, this.startProcessing);
            EventBus.listen('submission-ended-' + this.group, this.stopProcessing);
        },
        methods: {
            trigger() {
                EventBus.fire(this.fire + '-' + this.group);
            }
        }
    }
</script>