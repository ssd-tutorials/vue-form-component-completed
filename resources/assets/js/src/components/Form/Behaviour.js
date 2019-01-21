export default class Behaviour {

    static confirmWithDialogAndReset(form, response) {

        form.stopProcessingAjaxCall();
        form.reset();

        Behaviour.confirm(form, response);
    }

    static confirmWithDialogAndClear(form, response) {

        form.stopProcessingAjaxCall();
        form.clear();

        Behaviour.confirm(form, response);
    }

    static confirm(form, response) {
        EventBus.fire('top-alert', {
            id: form.group,
            message: response.data.message,
        });
    }

    static redirect(form, response) {
        window.location.href = response.data.url;
    }

    static reload() {
        window.location.reload(true);
    }

    static sleep(form) {
        form.stopProcessingAjaxCall();
    }
}