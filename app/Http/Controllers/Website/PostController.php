<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Posts\Store;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->with(['category', 'comments', 'media', 'user'])->withCount('comments')->orderBy('id', 'desc')->paginate(8);
        return view('website.users.posts.index', compact('posts'));
    }

    public function create() {
        $categories = Category::whereStatus(1)->get(['name', 'id']);
        return view('website.users.posts.create', compact('categories'));
    }

    public function store(Store $request) {
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        $data['comment_able'] = $request->input('comment_able');
        $data['category_id'] = $request->input('category_id');
        $post = auth()->user()->posts()->create($data);

        if ($request->images && count($request->images) > 0) {
            $i = 1;
            foreach ($request->images as $file) {
                $filename = $post->slug. '-' .time() . '-' .$i . '.' .$file->getClientOriginalExtension();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $path = public_path('assets/posts/' . $filename);
                Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                    $post->media()->create([
                        'file_name' => $filename,
                        'file_type' => $file_type,
                        'file_size' => $file_size,
                    ]);
                    $i++;
            }
            if ($request->status == 1) {
                Cache::forget('recent_posts');
            }
        }
        toast('Created Post Successfully','success');
        return redirect()->route('posts.index');
    }

    public function edit($id) {
        $post = Post::whereSlug($id)->orWhere('id', $id)->whereUserId(auth()->id())->first();
        if ($post) {
            $categories = Category::whereStatus(1)->get(['name', 'id']);
            return view('website.users.posts.edit', compact('post', 'categories'));
        }
    }

    public function update(Store $request, $id) {
        $post = Post::whereSlug($id)->orWhere('id', $id)->whereUserId(auth()->id())->first();
        if ($post) {
            $data['title'] = $request->input('title');
            $data['description'] = $request->input('description');
            $data['status'] = $request->input('status');
            $data['comment_able'] = $request->input('comment_able');
            $data['category_id'] = $request->input('category_id');
            $post->update($data);
        }

        if ($request->images && count($request->images) > 0) {
            $i = 1;
            foreach ($request->images as $file) {
                $filename = $post->slug. '-' .time() . '-' .$i . '.' .$file->getClientOriginalExtension();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $path = public_path('assets/posts/' . $filename);
                Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $post->media()->create([
                    'file_name' => $filename,
                    'file_type' => $file_type,
                    'file_size' => $file_size,
                ]);
                $i++;
            }
            if ($request->status == 1) {
                Cache::forget('recent_posts');
            }
        }
        toast('Updated Post Successfully','success');
        return redirect()->route('posts.index');
    }

    public function show() {
        //
    }

    public function post_media_destroy($id) {
        $media = PostMedia::whereId($id)->first();
        if($media) {
            if (File::exists('assets/posts/' . $media->file_name)) {
                unlink('assets/posts/' . $media->file_name);
            }
            $media->delete();
            return true;
        }
        return false;
    }

    public function destroy($id) {
        $post = Post::whereSlug($id)->orWhere('id', $id)->whereUserId(auth()->id())->first();
        if ($post) {
            if ($post->media->count() > 0) {
                foreach ($post->media as $media) {
                    if (File::exists('assets/posts/' . $media->file_name)) {
                        unlink('assets/posts/' . $media->file_name);
                    }
                }
            }
            $post->delete();
            toast('Deleted Post Successfully','success');
            return redirect()->route('posts.index');
        }
    }

}
