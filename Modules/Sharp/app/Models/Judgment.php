<?php

namespace Modules\Sharp\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sharp\Database\Factories\JudgmentFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Judgment extends Model implements HasMedia
{
    use HasFactory,SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "sharp_id",
        "judgment_id",
        "content",
        "is_agree",
        "user_id"
    ];

    protected function casts(): array
    {
        return [
            "is_agree" => "boolean"
        ];
    }

    protected static function newFactory(): JudgmentFactory
    {
        return JudgmentFactory::new();
    }


}
