import Helper from '../../../core/Helper';

export default class Rule {

    static required(value) {
        return !Helper.isEmpty(value);
    }

    static validateIfNotEmpty(value, callback) {
        if (Helper.isEmpty(value)) {
            return true;
        }

        return callback();
    }

    static min(value, params) {
        if (typeof value === 'string') {
            return Rule.validateIfNotEmpty(value, () => {
                return value.length >= params;
            });
        }

        return Object.keys(value).length >= params;
    }

    static max(value, params) {
        if (typeof value === 'string') {
            return Rule.validateIfNotEmpty(value, () => {
                return value.length <= params;
            });
        }

        return Object.keys(value).length <= params;
    }

    static email(value) {
        return Rule.validateIfNotEmpty(value, () => {
            const pattern = /^[a-zA-Z0-9._\-]+@[a-zA-Z0-9]+([.\-]?[a-zA-Z0-9]+)?([\.]{1}[a-zA-Z]{2,4}){1,4}$/;
            return pattern.test(value);
        });
    }

    static password(value) {
        return Rule.validateIfNotEmpty(value, () => {
            const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,30}$/;
            return pattern.test(value);
        });
    }

    static accepted(value) {
        return ['yes', 'on', 1, '1', true].includes(value);
    }

    static in(value, params) {
        return Rule.validateIfNotEmpty(value, () => {
            return params.split(',').map(item => item.trim()).includes(value.toString());
        });
    }
}