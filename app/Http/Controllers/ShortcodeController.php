<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortcodeHistory;
use App\Models\ShortcodeTemplate;
use tehwave\Shortcodes\Shortcode;
use Barryvdh\DomPDF\Facade\Pdf;

class ShortcodeController extends Controller
{

    public function index(Request $request)
    {
        $theme = $request->get('theme', 'dark');
        $history = ShortcodeHistory::latest()->get();
        $templates = ShortcodeTemplate::all();
        $defaultTemplates = ShortcodeTemplate::where('is_default', true)->get();

        return view(
            'shortcodes.index',
            [
                'history' => $history,
                'templates' => $templates,
                'defaultTemplates' => $defaultTemplates,
                'content' => session('content'),
                'parsedContent' => session('parsedContent'),
                'theme' => $theme
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


    public function ajaxParse(Request $request)
    {
        $content = $request->content;
        $parsedContent = Shortcode::compile($content);

        return response()->json([
            'parsedContent' => $parsedContent
        ]);
    }


    public function saveTemplate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'shortcode_content' => 'required|string',
            'category' => 'nullable|string|max:255'
        ]);

        ShortcodeTemplate::create($request->all());

        return redirect('/')->with('success', 'Template saved successfully!');
    }


    public function loadTemplate($id)
    {
        $template = ShortcodeTemplate::findOrFail($id);

        return response()->json([
            'content' => $template->shortcode_content,
            'name' => $template->name
        ]);
    }


    public function exportPdf(Request $request)
    {
        $content = $request->content;
        $parsedContent = Shortcode::compile($content);

        $pdf = Pdf::loadView('shortcodes.pdf', [
            'parsedContent' => $parsedContent,
            'content' => $content
        ]);

        return $pdf->download('shortcode-output.pdf');
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
