<?php

namespace App\Core\Requests;

use App\Core\Traits\ApiFormResponse;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    use ApiFormResponse;
}
