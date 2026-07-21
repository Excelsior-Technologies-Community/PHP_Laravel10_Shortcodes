<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class TooltipShortcode extends Shortcode
{
    protected $tag = 'tooltip';

    public function handle(): ?string
    {
        $title = $this->attributes['title'] ?? 'Tooltip';
        $placement = $this->attributes['placement'] ?? 'top';

        return '
        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="' . $placement . '" title="' . $title . '">
            ' . $this->body . '
        </span>';
    }
}
