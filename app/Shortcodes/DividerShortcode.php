<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class DividerShortcode extends Shortcode
{
    protected $tag = 'divider';

    public function handle(): ?string
    {
        return '<hr class="my-4 border-secondary">';
    }
}
