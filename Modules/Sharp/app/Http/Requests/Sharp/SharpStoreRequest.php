<?php

namespace Modules\Sharp\app\Http\Requests\Sharp;

use App\Core\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class SharpStoreRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title" => ["string","max:255","required"],
            "content" => ["string","required"],
            "is_anonymously" => ["nullable","boolean"],
            "attachments" => ["nullable","array"],
            "attachments.*" => [Rule::file()->extensions(["mp4","jpg","png","jpeg","webp"])]
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
