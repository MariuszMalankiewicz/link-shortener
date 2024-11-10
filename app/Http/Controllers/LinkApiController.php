<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $shortCode = Str::random(6);

        $link = Link::create([
            'original_url' => $request->input('original_url'),
            'short_code' => $shortCode,
        ]);

        return response()->json([
            'short_url' => "https://{$shortCode}"
        ], 201);
    }

    public function redirect($shortCode)
    {
        $link = Link::where('short_code', $shortCode)->first();

        if ($link) {
            return response()->json([
                'original_url' => $link->original_url
            ]);
        }

        return response()->json(['message' => 'Link not found'], 404);
    }

    public function index()
    {
        $links = Link::all();

        return response()->json($links);
    }
}
