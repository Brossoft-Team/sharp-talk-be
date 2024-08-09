<?php

namespace Modules\Sharp\app\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SharpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return $this->is_anonymously ? [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "judgments" => JudgmentResource::collection($this->whenLoaded("judgments")),
            "judgments_count" => $this->judgments_count,
        ] : parent::toArray($request);
    }
}
