<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortcodeHistory;
use tehwave\Shortcodes\Shortcode;

class ShortcodeController extends Controller
{

    public function index()
    {
        $history = ShortcodeHistory::latest()->get();

        return view(
            'shortcodes.index',
            [
                'history' => $history,
                'content' => session('content'),
                'parsedContent' => session('parsedContent')
            ]
        );
    }


    public function parse(Request $request)
    {

        $content = $request->content;

        $parsedContent = Shortcode::compile($content);


        ShortcodeHistory::create([
            'shortcode_content' => $content,
            'rendered_html' => $parsedContent
        ]);


        return redirect('/')
            ->with([
                'content' => $content,
                'parsedContent' => $parsedContent
            ]);

    }


    public function show($id)
    {

        $item = ShortcodeHistory::findOrFail($id);


        return view(
            'shortcodes.history',
            compact('item')
        );

    }


    public function destroy($id)
    {

        ShortcodeHistory::findOrFail($id)->delete();


        return redirect('/')
            ->with('success','History deleted successfully');

    }

}