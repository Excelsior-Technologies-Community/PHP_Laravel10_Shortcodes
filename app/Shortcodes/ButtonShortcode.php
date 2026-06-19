<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class ButtonShortcode extends Shortcode
{
    protected $tag = 'button';

    public function handle(): ?string
    {
        $url = $this->attributes['url'] ?? '#';

        return sprintf(
            '<a href="%s" target="_blank" class="btn btn-primary">
                %s
            </a>',
            $url,
            $this->body
        );
    }
}