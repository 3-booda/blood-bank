<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category:id,name')->paginate(PAGINATE);

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $image = "uploads/images/" . $request->file('image')->hashName();
        $request->file('image')->storeAs("public", $image);

        Post::create(['admin_id' => auth('admin')->user()->id, 'image' => $image] + $request->all());

        return redirect()->route('dashboard.posts.index');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {

    }

    public function update(Request $request, Post $post)
    {

    }

    public function destroy(Post $post)
    {
        $image = Storage::disk('public')->exists($post->image);

        if ($image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.posts.index');
    }
}
