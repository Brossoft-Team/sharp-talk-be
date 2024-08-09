<?php

namespace Modules\Sharp\app\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Sharp\app\Transformers\JudgmentResource;
use Modules\User\App\Transformers\UserResource;

class SharpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);

    }
}
