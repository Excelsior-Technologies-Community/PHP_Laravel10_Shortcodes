<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use tehwave\Shortcodes\Shortcode;

class ShortcodeController extends Controller
{
    public function index()
    {
        return view('shortcodes.index');
    }

    public function parse(Request $request)
    {
        $content = $request->content;

        $parsedContent = Shortcode::compile($content);

        return view(
            'shortcodes.index',
            compact('content', 'parsedContent')
        );
    }
}