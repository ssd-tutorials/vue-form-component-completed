<div class="grid-x">

    <div class="cell small-12 medium-3 large-2">
        <form-trigger group="{{ $group }}" fire="submit" v-cloak>
            <span
                slot-scope="props"
                class="expanded button"
                :class="{ disabled: props.isDisabled }"
                @click="props.trigger"
            >
                <span v-if="!props.processing">
                    <i class="fas fa-check fa-fw"></i> SUBMIT
                </span>
                <span v-else>
                    <i class="fas fa-spinner fa-spin fa-fw"></i> PROCESSING
                </span>
            </span>
        </form-trigger>
    </div>

    <div class="cell small-12 medium-6 large-4 medium-offset-3 large-offset-6 medium-text-right">

        <nav class="expanded button-group">
            <form-trigger
                group="{{ $group }}"
                fire="disable-started"
                v-cloak
            >
                <span
                    slot-scope="props"
                    class="secondary button"
                    @click="props.trigger"
                    v-if="!props.isDisabled"
                >
                    <i class="fas fa-power-off fa-fw"></i> DISABLE
                </span>
            </form-trigger>
            <form-trigger
                group="{{ $group }}"
                fire="disable-ended"
                v-cloak
                :always-enabled="true"
            >
                <span
                    slot-scope="props"
                    class="success button"
                    @click="props.trigger"
                    v-if="props.isDisabled"
                >
                    <i class="fas fa-power-off fa-fw"></i> ENABLE
                </span>
            </form-trigger>
            <form-trigger group="{{ $group }}" fire="reset" v-cloak>
                <span
                    slot-scope="props"
                    class="alert button"
                    :class="{ disabled: props.isDisabled }"
                    @click="props.trigger"
                >
                    <span v-if="!props.processing">
                        <i class="fas fa-eraser fa-fw"></i> RESET
                    </span>
                    <span v-else>
                        <i class="fas fa-spinner fa-spin fa-fw"></i> PROCESSING
                    </span>
                </span>
            </form-trigger>
            <form-trigger group="{{ $group }}" fire="clear" v-cloak>
                <span
                    slot-scope="props"
                    class="warning button"
                    :class="{ disabled: props.isDisabled }"
                    @click="props.trigger"
                >
                    <span v-if="!props.processing">
                        <i class="fas fa-times fa-fw"></i> CLEAR
                    </span>
                    <span v-else>
                        <i class="fas fa-spinner fa-spin fa-fw"></i> PROCESSING
                    </span>
                </span>
            </form-trigger>
        </nav>

    </div>

</div>