<?php

namespace App\Http\Requests;

class QueryWeatherRequest extends Request
{
    /**
     * Zip validator is a custom validator. See App\Validators\ZipValidator class for reference
     *
     * @return array
     */
    public function rules(){
        return [
            'zipCode' => 'required|zip'
        ];
    }

    /**
     * @return bool
     */
    public function authorize(){
        return true;
    }
}
