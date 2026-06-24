<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortcodeHistory extends Model
{

    protected $fillable = [

        'shortcode_content',
        'rendered_html'

    ];

}