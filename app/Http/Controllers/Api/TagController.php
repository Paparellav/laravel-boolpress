<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return response()->json([
            'success' => true,
            'results' => $tags
        ]);
    }

    public function show($slug)
    {
        $single_tag = Tag::where('slug', $slug)->with(['posts'])->first();
        if ($single_tag) {
            return response()->json([
                'success' => true,
                'results' => $single_tag
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'No tag found'
        ]);
    }
}
