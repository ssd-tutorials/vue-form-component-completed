export default class ErrorHandler {

    static showError(error, beforeCallback = null) {
        if (typeof beforeCallback === 'function') {
            beforeCallback();
        }
        if (error.response && error.response.data) {
            ErrorHandler.errorDialog(error.response.data.message);
            return;
        }
        if (error.message) {
            ErrorHandler.errorDialog(error.message);
            return;
        }
        console.log(error);
    }

    static errorDialog(message, id = 'request-failure') {
        EventBus.fire('top-warning', { id, message });
    }
}