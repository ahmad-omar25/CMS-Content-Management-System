<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\SendMessage\Store;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // View Homepage
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

    // View Post page
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

    // Store comments
    public function store_comment(Request $request, $slug) {
        $post = Post::whereSlug($slug)->wherePostType('post')->whereStatus(1)->first();
        if ($post) {
            $userId = auth()->id();
            $data['comment'] = $request->input('comment');
            $data['ip_address'] = $request->ip();
            $data['post_id'] = $post->id;
            $data['user_id'] = $userId;
            $post->comments()->create($data);
            toast('Comment Created Successfully','success');
            return redirect()->back();
        }
    }

    // View contact us
    public function contact() {
        return view('website.contact.index');
    }

    // User send message for admins
    public function send_message(Store $request) {
        Contact::create($request->except('_token'));
        toast('Message send successfully','success');
        return redirect()->back();
    }

    // Search post
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

    // Filter with category
    public function category($slug) {
        $category = Category::whereSlug($slug)->orWhere('id', $slug)->whereStatus(1)->first()->id;

        if ($category) {
            $posts = Post::with(['media', 'user', 'category'])
                ->withCount('approved_comments')
                ->whereCategoryId($category)
                ->wherePostType('post')
                ->whereStatus(1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            return view('website.home', compact('posts'));
        }
        return redirect()->route('homepage');
    }

    // Filter with archive
    public function archive($date) {
        $exploded_date = explode('-', $date);
        $month = $exploded_date[0];
        $year = $exploded_date[1];
        $posts = Post:: with(['media', 'user', 'category'])
            ->withCount('approved_comments')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->wherePostType('post')
            ->whereStatus(1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('website.home', compact('posts'));
    }

    // Filter with author
    public function author($username) {
        $user = User::whereName($username)->first()->id;

        if ($user) {
            $posts = Post::with(['media', 'user', 'category'])
                ->withCount('approved_comments')
                ->whereUserId($user)
                ->wherePostType('post')
                ->whereStatus(1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            return view('website.home', compact('posts'));
        }
        return redirect()->route('homepage');
    }

    public function user_logout() {
        auth()->logout();
        return redirect()->route('homepage');
    }
}
