<script>
    import Trigger from './Trigger';
    import Behaviour from './Behaviour';
    import AjaxCaller from '../../mixins/AjaxCaller';
    import MultiHandler from '../../mixins/MultiHandler';
    export default {
        mixins: [Trigger, AjaxCaller, MultiHandler],
        props: {
            behaviour: {
                type: String,
                required: false
            },
            listen: {
                type: String,
                required: false
            }
        },
        computed: {
            requestData() {
                return { items: this.items };
            }
        },
        methods: {
            evaluate() {
                this.isDisabled = this.items.length === 0;
            },
            trigger() {
                if (Behaviour.isNonAjax(this.behaviour)) {
                    Behaviour[this.behaviour](this, this.items);
                    return;
                }
                this.makeAjaxCall(this.callSuccessful, this.callFailed);
            },
            startProcessingAjaxCallEvent() {
                EventBus.fire('disable-started-' + this.group);
            },
            stopProcessingAjaxCallEvent() {
                EventBus.fire('disable-ended-' +  this.group);
            },
            callSuccessful(response) {
                try {
                    Behaviour[this.behaviour ? this.behaviour : response.data.behaviour](this, response);
                } catch (error) {
                    ErrorHandler.showError({
                        message: "Invalid form behaviour '" + response.data.behaviour + "'."
                    });
                    this.stopProcessingAjaxCall();
                }
            },
            callFailed(error) {
                ErrorHandler.showError(error, this.stopProcessingAjaxCall);
            }
        }
    }
</script>