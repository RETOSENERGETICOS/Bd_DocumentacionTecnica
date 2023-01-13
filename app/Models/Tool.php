<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'has_validation' => 'boolean',
        'dispatchable' => 'boolean'
    ];

    public function docum(): BelongsTo {
        return $this->belongsTo(Docum::class);
    }

    public function tech(): BelongsTo {
        return $this->belongsTo(Tech::class);
    }

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function area(): BelongsTo {
        return $this->belongsTo(Area::class);
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    public function files(): MorphMany {
        return $this->morphMany(File::class, 'fileable');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function logs(): HasMany {
        return $this->hasMany(Log::class);
    }
}
