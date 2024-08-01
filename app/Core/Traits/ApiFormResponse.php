<?php

namespace App\Core\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiFormResponse
{
    use ApiResponse;
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException($this->errorResponse($validator->errors(), 422));
    }
}
