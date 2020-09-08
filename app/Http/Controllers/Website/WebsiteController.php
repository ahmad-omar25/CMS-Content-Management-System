<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\SendMessage\Store;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'user', 'media'])
            ->whereHas('category', function ($q) {
                $q->whereStatus(1);
            })
            ->whereHas('user', function ($q) {
                $q->whereStatus(1);
            })
            ->wherePostType('post')->whereStatus(1)->orderBy('id', 'desc')->paginate(5);
        return view('website.home', compact('posts'));
    }

    public function post_show($slug)
    {
        $post = Post::with(['category', 'user', 'media',
            'approved_comments' => function ($q) {
                $q->orderBy('id', 'desc');
            }
        ]);
        $post = $post->whereHas('category', function ($q) {
            $q->whereStatus(1);
        })->whereHas('user', function ($q) {
                $q->whereStatus(1);
            });
        $post = $post->whereSlug($slug)->wherePostType('post')->whereStatus(1)->first();
        if ($post) {
            return view('website.posts.show', compact('post'));
        }
    }

    public function store_comment(Request $request, $slug) {
        $post = Post::whereSlug($slug)->wherePostType('post')->whereStatus(1)->first();
        if ($post) {
            $userId = auth()->check() ? auth()->id() : null;
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['comment'] = $request->input('comment');
            $data['url'] = $request->input('url');
            $data['ip_address'] = $request->ip();
            $data['post_id'] = $post->id;
            $data['user_id'] = $userId;
            $post->comments()->create($data);
            toast('Comment Created Successfully','success');
            return redirect()->back();
        }
    }

    public function contact() {
        return view('website.contact.index');
    }

    public function send_message(Store $request) {
        Contact::create($request->except('_token'));
        toast('Message send successfully','success');
        return redirect()->back();
    }

    public function search(Request $request) {
        $keyword = isset($request->keyword)  && $request->keyword != '' ? $request->keyword : null;
        $posts = Post::with(['category', 'user', 'media'])
            ->whereHas('category', function ($q) {
                $q->whereStatus(1);
            })
            ->whereHas('user', function ($q) {
                $q->whereStatus(1);
            });

        if ($keyword != null) {
            $posts = $posts->search($keyword, null, true);
        }
        $posts = $posts->wherePostType('post')->whereStatus(1)->orderBy('id', 'desc')->paginate(5);
        return view('website.home', compact('posts'));
    }
}
