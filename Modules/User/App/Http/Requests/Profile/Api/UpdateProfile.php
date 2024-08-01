<?php

namespace Modules\User\App\Http\Requests\Profile\Api;

use App\Core\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;
use Modules\User\App\Models\User;

class UpdateProfile extends ApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => ["string","required"],
            "email" => ["string","required","email",Rule::unique(User::class,"email")->ignore($this->user()->id)],
            "username" => ["string","required",Rule::unique(User::class,"username")->ignore($this->user()->id)],
            "password" => ["string","nullable","confirmed"],
            "old_password" => ["string","nullable",Rule::requiredIf($this->has("password"))],
            "profile_pic" => ["nullable", Rule::imageFile()->extensions("jpeg,png,jpg")]
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
