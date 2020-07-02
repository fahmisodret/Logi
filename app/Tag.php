<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "blog_tags";

    protected $fillable = ['title', 'slug', 'meta_title'];

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'articles_tags', 'tag_id', 'article_id');
    }

    public function getArticlesCountAttribute()
    {
        return $this->articles->count();
    }
}
