<?php
namespace App\Validators;

use Illuminate\Validation\Validator;

class ZipValidator extends Validator
{
    public function validateZip($attribute, $value, $parameters)
    {
        return preg_match('/^[0-9]{5}(\-[0-9]{4})?$/', $value);
    }
}