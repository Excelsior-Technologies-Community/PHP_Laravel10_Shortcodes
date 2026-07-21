<?php

namespace App\Shortcodes;

use tehwave\Shortcodes\Shortcode;

class ProgressShortcode extends Shortcode
{
    protected $tag = 'progress';

    public function handle(): ?string
    {
        $value = $this->attributes['value'] ?? 50;
        $color = $this->attributes['color'] ?? 'success';
        $label = $this->attributes['label'] ?? '';

        return '
        <div class="mb-3">
            <div class="d-flex justify-content-between mb-1">
                <span class="text-white">' . $label . '</span>
                <span class="text-white">' . $value . '%</span>
            </div>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-' . $color . '" role="progressbar" style="width: ' . $value . '%" aria-valuenow="' . $value . '" aria-valuemin="0" aria-valuemax="100">' . $value . '%</div>
            </div>
        </div>';
    }
}
