<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        mounted() {
            this.registerCustomListeners();
        },
        methods: {
            registerCustomListeners() {
                if (!this.listen) {
                    return;
                }
                EventBus.listen(this.listen, item => {
                    if (item.remove) {
                        this.remove(item);
                    } else if (item.value && !this.items.includes(item.value)) {
                        this.items.push(item.value);
                    }
                    this.evaluate();
                });
            },
            remove(item) {
                this.items = this.items.filter(element => element !== item.value);
            },
            evaluate() {}
        }
    }
</script>