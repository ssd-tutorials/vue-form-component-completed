@extends('template.app')

@section('content')

    <multi-checkbox-trigger
        group="multi-checkbox"
        :disabled="true"
        behaviour="reload"
        listen="select-single"
        action="{{ route('multi_checkbox.destroy') }}"
    >
        <span
            slot-scope="props"
            class="alert button"
            :class="{ disabled: props.isDisabled }"
            @click="props.trigger"
        >
            <span v-if="!props.processing">
                <i class="fas fa-times fa-fw"></i> REMOVE
            </span>
            <span v-else>
                <i class="fas fa-spinner fa-spin fa-fw"></i> PROCESSING
            </span>
        </span>
    </multi-checkbox-trigger>

    <multi-checkbox-trigger
        group="multi-checkbox"
        name="records"
        :disabled="true"
        behaviour="goTo"
        listen="select-single"
        action="{{ route('multi_checkbox.export') }}"
    >
        <span
            slot-scope="props"
            class="success button"
            :class="{ disabled: props.isDisabled }"
            @click="props.trigger"
        >
            <span v-if="!props.processing">
                <i class="fas fa-download fa-fw"></i> EXPORT
            </span>
            <span v-else>
                <i class="fas fa-spinner fa-spin fa-fw"></i> PROCESSING
            </span>
        </span>
    </multi-checkbox-trigger>

    <form-wrapper group="multi-checkbox">

        <table slot-scope="props">
            <thead>
            <tr>
                <th width="1">
                    <master-checkbox-input
                        name="master"
                        :total="3"
                        listen="select-single"
                        fire="select-multiple"
                        :disabled="props.isDisabled"
                    ></master-checkbox-input>
                </th>
                <th>
                    Table Header
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <checkbox-input
                        name="record-1"
                        id="record-1"
                        fire="select-single"
                        listen="select-multiple"
                        true-value="1"
                        :disabled="props.isDisabled"
                    ></checkbox-input>
                </td>
                <td>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                </td>
            </tr>
            <tr>
                <td>
                    <checkbox-input
                        name="record-2"
                        id="record-2"
                        fire="select-single"
                        listen="select-multiple"
                        true-value="2"
                        :disabled="props.isDisabled"
                    ></checkbox-input>
                </td>
                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</td>
            </tr>
            <tr>
                <td>
                    <checkbox-input
                        name="record-3"
                        id="record-3"
                        fire="select-single"
                        listen="select-multiple"
                        true-value="3"
                        :disabled="props.isDisabled"
                    ></checkbox-input>
                </td>
                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</td>
            </tr>
            </tbody>
        </table>

    </form-wrapper>

@endsection