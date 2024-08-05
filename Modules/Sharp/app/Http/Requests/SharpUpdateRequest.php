<?php

namespace Modules\Sharp\App\Http\Requests;

use App\Core\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SharpUpdateRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title" => ["string","max:255","required"],
            "content" => ["string","required"],
            "owner_id" => ["required",Rule::exists("users","id")],
            //TODO: add attachments
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
