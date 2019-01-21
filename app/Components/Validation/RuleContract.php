<?php

namespace App\Components\Validation;

use Illuminate\Contracts\Validation\Rule;

interface RuleContract extends Rule
{
    /**
     * Get the validation rule.
     *
     * @return string
     */
    public function rule(): string;
}