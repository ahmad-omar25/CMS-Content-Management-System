<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Sluggable;

    use SearchableTrait;

    protected $guarded = [];

    protected $searchable = [
        'columns' => ['posts.title' => 10]
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function approved_comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->whereStatus(1);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }
}
