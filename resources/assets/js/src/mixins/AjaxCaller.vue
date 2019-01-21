<script>
    import Processor from './Processor';
    export default {
        mixins: [Processor],
        props: {
            action: {
                type: String,
                default: '/'
            },
            method: {
                type: String,
                default: 'post'
            }
        },
        computed: {
            endPoint() {
                return this.action;
            },
            requestData() {
                return {};
            },
        },
        methods: {
            makeAjaxCall(success, failure) {
                this.startProcessingAjaxCall();
                this.makeAjaxRequest(success, failure);
            },
            startProcessingAjaxCall() {
                this.startProcessing();
                this.startProcessingAjaxCallEvent();
            },
            startProcessingAjaxCallEvent() {},
            stopProcessingAjaxCall() {
                this.stopProcessing();
                this.stopProcessingAjaxCallEvent();
            },
            stopProcessingAjaxCallEvent() {},
            makeAjaxRequest(success, failure, data, url, method) {
                let requestData = {
                    url: url || this.endPoint,
                    method: (method || this.method).toLowerCase(),
                    params: {},
                    data: {}
                };

                if (['post', 'put', 'patch'].includes(requestData.method)) {
                    requestData.data = data || this.requestData;
                } else {
                    requestData.params = data || this.requestData;
                }
                axios.request(requestData)
                    .then(success)
                    .catch(failure);
            },
        }
    }
</script>