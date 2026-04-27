<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
        return view('admin.short_links.index', compact('shortLinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'short_code' => 'nullable|alpha_dash|unique:short_links,short_code',
        ]);

        $shortCode = $request->short_code ?: Str::random(6);

        ShortLink::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
        ]);

        return back()->with('success', 'Short link created successfully!');
    }

    public function redirect($code)
    {
        $link = ShortLink::where('short_code', $code)->firstOrFail();
        $link->increment('clicks');
        return redirect($link->original_url);
    }

    public function destroy(ShortLink $link)
    {
        $link->delete();
        return back()->with('success', 'Short link deleted successfully!');
    }
}
