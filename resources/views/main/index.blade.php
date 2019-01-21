@extends('template.app')

@section('content')

    @include('template.partials.form-buttons-detached', ['group' => 'update-form'])

    <form-wrapper
        group="update-form"
        action="{{ route('main.store') }}"
        :collections="{ address: {}, colours: [], fruit: [] }"
        v-cloak
    >

        <div slot-scope="props">

            <fieldset class="fieldset">

                <legend>Personal details</legend>

                <div class="grid-x grid-margin-x">

                    <div class="cell small-12 medium-6">

                        <single-select
                            :group="props.group"
                            name="title"
                            label="Title: *"
                            v-model="props.fields.title"
                            :options="[
                                {
                                    name: 'Mr',
                                    value: 1,
                                },
                                {
                                    name: 'Mrs',
                                    value: 2,
                                },
                                {
                                    name: 'Ms',
                                    value: 3,
                                },
                                {
                                    name: 'Master',
                                    value: 4,
                                },
                                {
                                    name: 'Miss',
                                    value: 5,
                                }
                            ]"
                            placeholder="Please select one"
                            :focus="true"
                            :validation="{
                                'required': 'Please select your title',
                                'in:1,2,3,4,5': 'Invalid selection'
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                        ></single-select>

                    </div>
                    <div class="cell small-12 medium-6"></div>

                    <div class="cell small-12 medium-6">

                        <text-input
                            :group="props.group"
                            label="First name: *"
                            name="first_name"
                            v-model="props.fields.first_name"
                            maxlength="30"
                            autocomplete="given-name"
                            :validation="{
                                'required': 'Please provide your first name',
                                'min:2': 'Minimum length 2 chars.',
                                'max:30': 'Maximum length 30 chars.',
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                            current-value="Sebastian"
                        ></text-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <text-input
                            :group="props.group"
                            label="Last name: *"
                            name="last_name"
                            v-model="props.fields.last_name"
                            maxlength="30"
                            autocomplete="family-name"
                            :validation="{
                                'required': 'Please provide your last name',
                                'min:2': 'Minimum length 2 chars.',
                                'max:30': 'Maximum length 30 chars.',
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                        ></text-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <email-input
                            :group="props.group"
                            label="Email: *"
                            name="email"
                            v-model="props.fields.email"
                            :validation="{
                                'required': 'Please provide a valid email address',
                                'email': 'Invalid email address'
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                        ></email-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <password-input
                            :group="props.group"
                            name="password"
                            label="Password: *"
                            v-model="props.fields.password"
                            autocomplete="off"
                            :validation="{
                                'required': 'Please provide your password',
                                'password': 'Invalid password format',
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                        ></password-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <text-input
                            :group="props.group"
                            name="address.line_1"
                            label="Address line 1: *"
                            v-model="props.fields.address.line_1"
                            :validation="{
                                'required': 'Please provide your address'
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                        ></text-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <text-input
                            :group="props.group"
                            name="address.line_2"
                            label="Address line 2:"
                            v-model="props.fields.address.line_2"
                            :disabled="props.isDisabled"
                        ></text-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <text-input
                            :group="props.group"
                            label="Town: *"
                            name="address.town"
                            v-model="props.fields.address.town"
                            :validation="{
                                'required': 'Please provide your town name'
                            }"
                            :error="props.error"
                            :disabled="props.isDisabled"
                        ></text-input>

                    </div>

                    <div class="cell small-12 medium-6">

                        <text-input
                            :group="props.group"
                            label="Post code: *"
                            name="address.post_code"
                            v-model="props.fields.address.post_code"
                            maxlength="10"
                            :validation="{
                                'required': 'Please provide your post code',
                                'max:10': 'Maximum 10 characters'
                            }"
                            :error="props.error"
                            current-value="LN20"
                            :disabled="props.isDisabled"
                        ></text-input>

                    </div>

                </div>

            </fieldset>

            <div class="grid-x grid-margin-x">

                <div class="cell small-12 medium-6">

                    <fieldset class="fieldset">

                        <legend>Consents</legend>

                        <div class="checkbox-group">

                            <checkbox-input
                                :group="props.group"
                                name="share"
                                label="Please share my data with third party"
                                v-model="props.fields.share"
                                :validation="{
                                    'required': 'Invalid selection',
                                    'in:a': 'We have to share your data'
                                }"
                                :error="props.error"
                                current-value="a"
                                true-value="a"
                                false-value="b"
                                validation-css-class="block"
                                :disabled="props.isDisabled"
                            ></checkbox-input>

                            <checkbox-input
                                :group="props.group"
                                name="privacy"
                                label="I agree with the privacy policy"
                                v-model="props.fields.privacy"
                                :validation="{
                                    'required': 'You have to agree with our privacy policy'
                                }"
                                :error="props.error"
                                :remove-when-false="true"
                                validation-css-class="block"
                                :disabled="props.isDisabled"
                            ></checkbox-input>

                            <checkbox-input
                                :group="props.group"
                                name="terms"
                                label="I agree with the terms & conditions"
                                v-model="props.fields.terms"
                                :validation="{
                                    'accepted': 'You have to agree with our terms & conditions'
                                }"
                                :error="props.error"
                                validation-css-class="block"
                                :disabled="props.isDisabled"
                            ></checkbox-input>

                        </div>

                    </fieldset>

                </div>

                <div class="cell small-12 medium-6">

                    <fieldset class="fieldset">

                        <legend>Colours (exactly 2 items)</legend>

                        <validation
                            id="colours"
                            name="colours"
                            :show="props.error.has('colours')"
                            :validation="{
                                'required': 'Please select exactly 2 items',
                                'min': 'Please select exactly 2 items',
                                'max': 'Please select exactly 2 items'
                            }"
                            :error="props.error"
                            css-class="block"
                        ></validation>

                        <div class="checkbox-group">

                            <checkbox-group-input
                                :group="props.group"
                                name="colours"
                                :current-value="['blue']"
                                :options="[
                                    {
                                        name: 'Blue',
                                        value: 'blue',
                                    },
                                    {
                                        name: 'Green',
                                        value: 'green',
                                    },
                                    {
                                        name: 'Orange',
                                        value: 'orange',
                                    }
                                ]"
                                v-model="props.fields.colours"
                                :validation="['required', 'min:2', 'max:2']"
                                :error="props.error"
                                :disabled="props.isDisabled"
                            ></checkbox-group-input>

                        </div>

                    </fieldset>

                </div>

            </div>

            <div class="grid-x grid-margin-x">

                <div class="cell small-12 medium-6">

                    <fieldset class="fieldset">

                        <legend>City</legend>

                        <div class="checkbox-group">

                            <validation
                                id="city"
                                name="city"
                                :show="props.error.has('city')"
                                :validation="{
                                    'required': 'Please select your city',
                                    'in': 'Please select your city',
                                }"
                                :error="props.error"
                                css-class="block"
                            ></validation>

                            <radio-input
                                :group="props.group"
                                name="city"
                                :options="[
                                    {
                                        name: 'London',
                                        value: 1,
                                    },
                                    {
                                        name: 'Paris',
                                        value: 2,
                                    },
                                    {
                                        name: 'Madrid',
                                        value: 3,
                                    },
                                    {
                                        name: 'Amsterdam',
                                        value: 6,
                                    }
                                ]"
                                v-model="props.fields.city"
                                :validation="['required', 'in:1,2,3,6']"
                                :error="props.error"
                                :disabled="props.isDisabled"
                            ></radio-input>

                        </div>

                    </fieldset>

                </div>

                <div class="cell small-12 medium-6">

                    <fieldset class="fieldset">

                        <legend>Fruit</legend>

                        <multiple-select
                            :group="props.group"
                            name="fruit"
                            v-model="props.fields.fruit"
                            :options="[
                                {
                                    name: 'Apple',
                                    value: 'apple',
                                },
                                {
                                    name: 'Orange',
                                    value: 'orange',
                                },
                                {
                                    name: 'Grapefruit',
                                    value: 'grapefruit',
                                },
                                {
                                    name: 'Banana',
                                    value: 'banana',
                                }
                            ]"
                            :validation="{ 'required': 'Please select your fruits' }"
                            :error="props.error"
                            :current-value="['banana', 'apple']"
                            input-css-class="margin-bottom-0"
                            :disabled="props.isDisabled"
                        ></multiple-select>

                    </fieldset>

                </div>

            </div>

            <text-area
                :group="props.group"
                name="excerpt"
                label="Excerpt: *"
                v-model="props.fields.excerpt"
                :validation="{
                    'required': 'Please provide the excerpt',
                    'min:3': 'Minimum 3 characters',
                    'max:10': 'Maximum 10 characters',
                }"
                :error="props.error"
                :disabled="props.isDisabled"
            >
                <div slot="body">Content goes here</div>
            </text-area>

            <wysiwyg-editor
                :group="props.group"
                name="body"
                label="Body: *"
                v-model="props.fields.body"
                :validation="{
                    'required': 'Please provide the body'
                }"
                :error="props.error"
                contents-css="{{ mix('css/editor.css') }}"
                :disabled="props.isDisabled"
            >
                <div slot="body">{{ '<h1>Body</h1>' }}</div>
            </wysiwyg-editor>

            <div class="divider"></div>

            @include('template.partials.form-buttons-attached')

        </div>

    </form-wrapper>

@endsection

@push('footer-scripts')
    <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
@endpush