<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{

    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'slug'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags() 
    {
        return $this->belongsToMany('App\Tag');
    }

    public static function generatePostSlug($title)
    {
        $base_slug = Str::slug($title, '-'); // mio-post
        $slug = $base_slug; // mio-post
        $count = 1;
        $post_found = Post::where('slug', '=', $slug)->first();
        while ($post_found) {
            $slug = $base_slug . '-' . $count; // mio-post-1
            $post_found = Post::where('slug', '=', $slug)->first();
            $count++; // 2
        }

        return $slug;
    }
}
