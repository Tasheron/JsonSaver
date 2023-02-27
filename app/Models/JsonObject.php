<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JsonObject extends Model
{
    public $table = 'json_objects';

    public $fillable = [
        'value',
        'author_id',
    ];

    public $timestamps = false;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
