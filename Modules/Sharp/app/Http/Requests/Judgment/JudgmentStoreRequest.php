<?php

namespace Modules\Sharp\app\Http\Requests\Judgment;

use App\Core\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;
use Modules\Sharp\app\Models\Judgment;
use Modules\Sharp\app\Models\Sharp;

class JudgmentStoreRequest extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "content" => ["required","string"],
            "judgment_id" => ["nullable",Rule::exists(Judgment::class,"id")],
           /* "sharp_id" => ["required",Rule::exists(Sharp::class,"id")],*/
            "is_agree" => ["required","boolean"],
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
