<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class YoutubeShortcode extends Shortcode
{
    protected $tag = 'youtube';

    public function handle(): ?string
    {
        $id = $this->attributes['id'] ?? '';
        $width = $this->attributes['width'] ?? '560';
        $height = $this->attributes['height'] ?? '315';

        if (empty($id)) {
            return '<div class="alert alert-danger">YouTube ID is required</div>';
        }

        return '<div class="ratio ratio-16x9 mb-3">
            <iframe src="https://www.youtube.com/embed/' . $id . '" width="' . $width . '" height="' . $height . '" frameborder="0" allowfullscreen></iframe>
        </div>';
    }
}
