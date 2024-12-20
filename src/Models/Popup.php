<?php

namespace Dashed\DashedPopups\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Dashed\DashedCore\Models\Concerns\HasCustomBlocks;

class Popup extends Model
{
    protected $table = 'dashed__popups';

    protected static function booted()
    {
        static::deleting(function ($popup) {
            $popup->views()->delete();
        });
    }

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function views(): HasMany
    {
        return $this->hasMany(PopupView::class);
    }
}
