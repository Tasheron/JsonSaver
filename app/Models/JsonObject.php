<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JsonObject extends Model
{
    public $table = 'json_objects';

    public $fillable = [
        'value',
        'author',
    ];

    public $timestamps = false;
}
