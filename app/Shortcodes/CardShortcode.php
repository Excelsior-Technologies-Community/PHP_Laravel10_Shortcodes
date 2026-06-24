<?php

namespace App\Shortcodes;
use tehwave\Shortcodes\Shortcode;

class CardShortcode extends Shortcode
{


    protected $tag = 'card';



    public function handle(): ?string
    {


        $title = $this->attributes['title'] ?? 'Card';



        return '

<div class="card shadow mb-3">

<div class="card-body">


<h4 class="card-title">
' . $title . '
</h4>


<p class="card-text">
' . $this->body . '
</p>


</div>

</div>

';
    }
}
