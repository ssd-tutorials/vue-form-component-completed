import Rule from './Rule';

export default class Validator {

    constructor(wrapper, resolve, reject) {

        this.fields = wrapper.fields;
        this.validationBag = wrapper.validationBag;
        this.errors = {};

        Promise.all(this.promises()).then(resolve).catch(error => {
            wrapper.error.set(this.errors);
            reject({ message: error });
        });
    }

    promises() {

        let promises = [];

        for (let field in this.validationBag) {
            promises.push(this.validate(field));
        }

        return promises;
    }

    validate(field) {

        return new Promise((resolve, reject) => {

            const
                rules = this.validationBag[field],
                rulesCount = rules.length,
                value = this.getValue(field);

            for (let index in rules) {

                if (!this.errors.hasOwnProperty(field)) {

                    let [rule, params] = rules[index].split(':');

                    try {

                        if (!Rule[rule](value, params)) {
                            this.errors[field] = rule;
                            reject("Your input was invalid.");
                        }

                    } catch (error) {
                        reject("Invalid form validation rule '" + rule + "'.");
                    }
                }

                if ((parseInt(index) + 1) === rulesCount) {
                    resolve();
                }
            }
        });
    }

    getValue(field) {

        return field.split('.').reduce((accumulator, currentValue) => {
            return accumulator[currentValue];
        }, this.fields);
    }
}