<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "blog_categories";

    protected $fillable = ['title', 'slug', 'content', 'meta_title'];

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'articles_categories', 'category_id', 'article_id');
        // return $this->hasMany('App\Article');
    }

    // public static function getFiveMostPopularOnes()
    // {
    //     return static::with('articles')->get()->sortByDesc(function ($category, $key) {
    //         return count($category->articles);
    //     })->take(5)->mapWithKeys(function ($item) {
    //         return [$item['id'] => ['slug' => $item['slug'], 'title' => $item['title']]];
    //     });

    // }

    public function getArticlesCountAttribute()
    {
        return $this->articles->count();
    }
}
