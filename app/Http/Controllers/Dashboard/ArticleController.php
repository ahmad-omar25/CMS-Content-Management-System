<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('dashboard.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('categories'));
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
