<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(PAGINATE);

        return response()->json([
            'data' => $posts
        ], Response::HTTP_OK);
    }

    public function show(post $post)
    {
        return $post;
    }

    public function favoritePosts()
    {
        $favoritePosts = auth()->user()->favorePosts;

        return response()->json([
            'data' => $favoritePosts
        ], Response::HTTP_OK);
    }

    public function toggleFavoritePosts(Request $request)
    {
        $toggles = auth()->user()->favorePosts()->toggle($request->ids);

        return response()->json([
            'data' => $toggles
        ], Response::HTTP_OK);;
    }
}
