Vue.component('top-dialog', require('./src/components/Dialogs/TopDialog').default);

Vue.component('form-wrapper', require('./src/components/Form/Wrapper').default);
Vue.component('validation', require('./src/components/Form/Validator/Validation').default);
Vue.component('form-trigger', require('./src/components/Triggers/FormTrigger').default);
Vue.component('multi-checkbox-trigger', require('./src/components/Triggers/MultiCheckBoxTrigger').default);

Vue.component('date-input', require('./src/components/Form/Inputs/Input/Date').default);
Vue.component('datetime-input', require('./src/components/Form/Inputs/Input/DateTime').default);
Vue.component('email-input', require('./src/components/Form/Inputs/Input/Email').default);
Vue.component('hidden-input', require('./src/components/Form/Inputs/Input/Hidden').default);
Vue.component('number-input', require('./src/components/Form/Inputs/Input/Number').default);
Vue.component('password-input', require('./src/components/Form/Inputs/Input/Password').default);
Vue.component('text-input', require('./src/components/Form/Inputs/Input/Text').default);
Vue.component('time-input', require('./src/components/Form/Inputs/Input/Time').default);

Vue.component('checkbox-input', require('./src/components/Form/Inputs/Input/CheckBox/CheckBox').default);
Vue.component('checkbox-group-input', require('./src/components/Form/Inputs/Input/CheckBox/CheckBoxGroup').default);
Vue.component('master-checkbox-input', require('./src/components/Form/Inputs/Input/CheckBox/MasterCheckBox').default);
Vue.component('radio-input', require('./src/components/Form/Inputs/Input/Radio').default);

Vue.component('single-select', require('./src/components/Form/Inputs/Select/Single').default);
Vue.component('multiple-select', require('./src/components/Form/Inputs/Select/Multiple').default);

Vue.component('text-area', require('./src/components/Form/Inputs/TextArea/TextArea').default);
Vue.component('wysiwyg-editor', require('./src/components/Form/Inputs/TextArea/Wysiwyg').default);