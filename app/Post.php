<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}