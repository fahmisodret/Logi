<?php

use App\Article;
use App\Category;
use Illuminate\Database\Seeder;

class ArticlesCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_articles_categories')->truncate();
        $articles = Article::all();
        $categories = Category::all()->toArray();
        foreach ($articles as $article) {
            $categoriesToAttach = array_unique(array_rand($categories, 3));
            $article->categories()->sync($categoriesToAttach);
        }

    }
}
