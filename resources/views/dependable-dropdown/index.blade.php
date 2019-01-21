@extends('template.app')

@section('content')

    <form-wrapper
        group="simple-filter"
        action="{{ route('dependable_dropdown.store') }}"
        v-cloak
    >

        <div slot-scope="props">

            <fieldset class="fieldset">

                <legend>Simple filtering</legend>

                <div class="grid-x grid-margin-x">

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="size"
                            label="Size: *"
                            v-model="props.fields.size"
                            :options="[
                                {
                                    name: 'Small',
                                    value: 1,
                                },
                                {
                                    name: 'Medium',
                                    value: 2,
                                },
                                {
                                    name: 'Large',
                                    value: 3,
                                },
                            ]"
                            placeholder="Please select one"
                            :focus="true"
                            :validation="{ 'required': 'Please select the size' }"
                            :error="props.error"
                        ></single-select>

                    </div>

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="colour"
                            label="Colour: *"
                            v-model="props.fields.colour"
                            :options="{
                                1: [
                                    {
                                        name: 'Green',
                                        value: 1,
                                    },
                                    {
                                        name: 'Orange',
                                        value: 2,
                                    },
                                    {
                                        name: 'Yellow',
                                        value: 3,
                                    },
                                ],
                                2: [
                                    {
                                        name: 'Blue',
                                        value: 4,
                                    },
                                    {
                                        name: 'White',
                                        value: 5,
                                    },
                                    {
                                        name: 'Black',
                                        value: 6,
                                    },
                                ],
                                3: [
                                    {
                                        name: 'Silver',
                                        value: 7,
                                    },
                                    {
                                        name: 'Brown',
                                        value: 8,
                                    },
                                    {
                                        name: 'Pink',
                                        value: 9,
                                    },
                                ]
                            }"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the colour' }"
                            :error="props.error"
                            :depends-on="props.fields.size"
                            :disabled="true"
                        ></single-select>

                    </div>

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="brand"
                            label="Brand: *"
                            v-model="props.fields.brand"
                            :options="{
                                1: [
                                    {
                                        name: 'Apple',
                                        value: 1,
                                    },
                                    {
                                        name: 'Banana',
                                        value: 2,
                                    },
                                ],
                                2: [
                                    {
                                        name: 'Orange',
                                        value: 4,
                                    },
                                    {
                                        name: 'Pear',
                                        value: 5,
                                    },
                                ],
                                3: [
                                    {
                                        name: 'Plumb',
                                        value: 7,
                                    },
                                    {
                                        name: 'Cherry',
                                        value: 8,
                                    },
                                ],
                                4: [
                                    {
                                        name: 'Peach',
                                        value: 9,
                                    },
                                    {
                                        name: 'Apricot',
                                        value: 10,
                                    },
                                ],
                                5: [
                                    {
                                        name: 'Plumb',
                                        value: 11,
                                    },
                                    {
                                        name: 'Cherry',
                                        value: 12,
                                    },
                                ],
                                6: [
                                    {
                                        name: 'Avocado',
                                        value: 13,
                                    },
                                    {
                                        name: 'Banana',
                                        value: 2,
                                    },
                                ],
                                7: [
                                    {
                                        name: 'Orange',
                                        value: 4,
                                    },
                                    {
                                        name: 'Cherry',
                                        value: 14,
                                    },
                                ],
                                8: [
                                    {
                                        name: 'Orange',
                                        value: 4,
                                    },
                                    {
                                        name: 'Cherry',
                                        value: 14,
                                    },
                                ],
                                9: [
                                    {
                                        name: 'Plumb',
                                        value: 11,
                                    },
                                    {
                                        name: 'Cherry',
                                        value: 12,
                                    },
                                ],
                            }"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the brand' }"
                            :error="props.error"
                            :depends-on="props.fields.colour"
                            :disabled="true"
                        ></single-select>

                    </div>

                </div>

            </fieldset>

            @include('template.partials.form-buttons-attached')

        </div>

    </form-wrapper>


    <form-wrapper
            group="ajax-filter"
            action="{{ route('dependable_dropdown.store') }}"
            v-cloak
    >

        <div slot-scope="props">

            <fieldset class="fieldset">

                <legend>Ajax filtering</legend>

                <div class="grid-x grid-margin-x">

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="size"
                            label="Size: *"
                            v-model="props.fields.size"
                            :options="{{ $sizes }}"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the size' }"
                            :error="props.error"
                        ></single-select>

                    </div>

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="colour"
                            label="Colour: *"
                            v-model="props.fields.colour"
                            options="{{ route('dependable_dropdown.attributes') }}"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the colour' }"
                            :error="props.error"
                            :depends-on="props.fields.size"
                            :disabled="true"
                            :fields="{
                                size: props.fields.size,
                                colour: props.fields.colour,
                                brand: props.fields.brand,
                            }"
                        ></single-select>

                    </div>

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="brand"
                            label="Brand: *"
                            v-model="props.fields.brand"
                            options="{{ route('dependable_dropdown.attributes') }}"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the brand' }"
                            :error="props.error"
                            :depends-on="props.fields.colour"
                            :disabled="true"
                            :fields="{
                                size: props.fields.size,
                                colour: props.fields.colour,
                                brand: props.fields.brand,
                            }"
                        ></single-select>

                    </div>

                </div>

            </fieldset>

            @include('template.partials.form-buttons-attached')

        </div>

    </form-wrapper>


    <form-wrapper
        group="ajax-summary"
        action="{{ route('dependable_dropdown.store') }}"
        :summary="{ total: 0 }"
        v-cloak
    >

        <div slot-scope="props">

            <fieldset class="fieldset">

                <legend>Ajax with summary</legend>

                <div class="grid-x grid-margin-x">

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="size"
                            label="Size: *"
                            v-model="props.fields.size"
                            :options="{{ $sizes }}"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the size' }"
                            :error="props.error"
                        ></single-select>

                    </div>

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="colour"
                            label="Colour: *"
                            v-model="props.fields.colour"
                            options="{{ route('dependable_dropdown.attributes') }}"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the colour' }"
                            :error="props.error"
                            :depends-on="props.fields.size"
                            :disabled="true"
                            :fields="{
                                size: props.fields.size,
                                colour: props.fields.colour,
                                brand: props.fields.brand,
                            }"
                        ></single-select>

                    </div>

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="brand"
                            label="Brand: *"
                            v-model="props.fields.brand"
                            options="{{ route('dependable_dropdown.attributes') }}"
                            placeholder="Please select one"
                            :validation="{ 'required': 'Please select the brand' }"
                            :error="props.error"
                            :depends-on="props.fields.colour"
                            :disabled="true"
                            :fields="{
                                size: props.fields.size,
                                colour: props.fields.colour,
                                brand: props.fields.brand,
                            }"
                            :is-last="true"
                        ></single-select>

                    </div>

                </div>


                <div class="primary callout">
                    <p v-if="props.summary.total">
                        <strong>Price:</strong> &pound;<span v-text="props.summary.total"></span>
                    </p>
                    <p v-else>
                        Please select all attributes to reveal the price
                    </p>
                </div>

            </fieldset>

            @include('template.partials.form-buttons-attached')

        </div>

    </form-wrapper>

@endsection