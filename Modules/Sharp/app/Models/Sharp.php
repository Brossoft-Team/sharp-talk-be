<?php

namespace Modules\Sharp\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sharp\Database\Factories\SharpFactory;
use Modules\User\App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sharp extends Model implements HasMedia
{
    use HasFactory,SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "title",
        "content",
        "user_id"
    ];

    protected static function newFactory(): SharpFactory
    {
        return SharpFactory::new();
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
