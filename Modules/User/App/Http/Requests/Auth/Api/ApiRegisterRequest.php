<?php

namespace Modules\User\App\Http\Requests\Auth\Api;

use App\Core\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class ApiRegisterRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', Rule::unique("users","email")],
            'password' => ['required', 'string','min:6'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
