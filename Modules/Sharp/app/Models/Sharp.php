<?php

namespace Modules\Sharp\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sharp\Database\Factories\SharpFactory;
use Modules\User\App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sharp extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "title",
        "content",
        "user_id",
        "is_anonymously"
    ];

    protected static function newFactory(): SharpFactory
    {
        return SharpFactory::new();
    }

    protected function casts(): array
    {
        return [
            "is_anonymously" => "boolean"
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function judgments(): HasMany
    {
        return $this->hasMany(Judgment::class);
    }

}
