<template>
    <div v-show="show" :class="computedWrapperCssClass" :style="computedWrapperCssStyle">
        <div v-for="option in options" :key="option.id" class="checkbox-group-item">
            <input
                type="radio"
                :id="option_id = optionId(option)"
                :name="name"
                :disabled="disabled"
                :autocomplete="autocomplete"
                :value="option.value"
                v-model="checked"
                @change="update"
            >
            <label :for="option_id" v-if="option.name" v-text="option.name"></label>
        </div>
    </div>
</template>
<script>
    import BaseInput from '../BaseInput';
    export default {
        mixins: [BaseInput],
        data() {
            return {
                checked: this.currentValue
            }
        },
        mounted() {
            if (this.checked) {
                this.emit(this.checked);
            }
            this.initialize();
            this.registerListeners();
        },
        methods: {
            reset() {
                if (this.currentValue) {
                    this.emit(this.checked = this.currentValue);
                    return;
                }
                this.clear();
            },
            clear() {
                this.checked = false;
                EventBus.fire('remove-field-' + this.group, this.name);
            },
            update(event) {
                this.emit(this.checked = event.target.value);
            }
        }
    }
</script>