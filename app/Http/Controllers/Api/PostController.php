<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(4);
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    public function show($slug)
    {
        $single_post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        if ($single_post) {
            return response()->json([
                'success' => true,
                'results' => $single_post
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'No post found'
        ]);
    }
}
