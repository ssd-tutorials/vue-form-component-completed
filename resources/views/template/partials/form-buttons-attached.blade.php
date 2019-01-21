<div class="grid-x">

    <div class="cell small-12 medium-3 large-2">

        <button
            type="submit"
            class="expanded button"
            v-show="!props.processing"
            :disabled="props.isDisabled"
        ><i class="fas fa-check fa-fw"></i> SUBMIT</button>
        <button
            type="button"
            disabled
            class="button"
            v-show="props.processing"
        ><i class="fas fa-spinner fa-spin fa-fw"></i> PROCESSING</button>

    </div>

    <div class="cell small-12 medium-6 large-4 medium-offset-3 large-offset-6 medium-text-right">

        <nav class="expanded button-group">
            <button
                type="button"
                class="secondary button"
                @click="props.disableEvent"
                v-if="!props.isDisabled"
            ><i class="fas fa-power-off fa-fw"></i> DISABLE</button>
            <button
                type="button"
                class="success button"
                @click="props.enableEvent"
                v-if="props.isDisabled"
            ><i class="fas fa-power-off fa-fw"></i> ENABLE</button>
            <button
                type="button"
                class="alert button"
                @click="props.reset"
                :disabled="props.isDisabled"
            ><i class="fas fa-eraser fa-fw"></i> RESET</button>
            <button
                type="button"
                class="warning button"
                @click="props.clear"
                :disabled="props.isDisabled"
            ><i class="fas fa-times fa-fw"></i> CLEAR</button>

        </nav>

    </div>

</div>