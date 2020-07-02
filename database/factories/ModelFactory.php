<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */



$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->unique()->word,
        'slug' => Str::slug($title),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = $faker->unique()->word,
        'slug' => Str::slug($title),
    ];
});

$factory->define(App\Article::class, function ($faker) use ($factory) {
    return [
        'author_id' => 1,
        'title' => $title = $faker->sentence,
        'slug' => Str::slug($title),
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'article_image' => '',
        'is_published' => true,
        'published_at' => date('Y-m-d H:i:s'),
    ];
});