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
            'short_url' => url("/api/{$shortCode}")
        ], 201);
    }
}
