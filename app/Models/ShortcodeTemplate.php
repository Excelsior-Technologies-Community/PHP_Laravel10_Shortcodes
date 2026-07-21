<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortcodeTemplate extends Model
{
    protected $fillable = [
        'name',
        'description',
        'shortcode_content',
        'category',
        'is_default'
    ];

    protected $casts = [
        'is_default' => 'boolean'
    ];
}
