<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('parent_id')->index()->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->text('html_content')->nullable();
            $table->string('article_image')->nullable();
            
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->datetime('published_at')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->index()->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->Text('content')->nullable();

            $table->string('meta_title')->nullable();
            $table->unsignedInteger('created_by')->index()->nullable()->comment('user id');
            $table->timestamps();
        });

        Schema::create('blog_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();

            $table->string('meta_title')->nullable();
            $table->timestamps();
        });

        Schema::create('blog_articles_categories', function (Blueprint $table) {
            $table->unsignedInteger('article_id')->index();
            $table->unsignedInteger('category_id')->index();
            
            $table->foreign('article_id')->references('id')->on('blog_articles')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });

        Schema::create('blog_articles_tags', function (Blueprint $table) {
            $table->unsignedInteger('article_id')->index();
            $table->unsignedInteger('tag_id')->index();
            
            $table->foreign('article_id')->references('id')->on('blog_articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('blog_tags')->onDelete('cascade');
        });

        Schema::create('blog_articles_comments', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('article_id')->index();
            $table->foreign('article_id')->references('id')->on('blog_articles')->onDelete('cascade');
            $table->unsignedInteger('user_id')->nullable()->index()->comment('if user was logged in');

            $table->string('ip')->nullable()->comment('if enabled in the config file');
            $table->string('author_name')->nullable()->comment('if not logged in');
            $table->string('author_email')->nullable();
            $table->string('author_website')->nullable();
            $table->text('comment')->comment('the comment body');

            $table->boolean('approved')->default(true);

            $table->timestamps();
        });

        Schema::create('blog_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('ip_address')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_subscriptions');
        Schema::dropIfExists('blog_articles_comments');
        Schema::dropIfExists('blog_articles_tags');
        Schema::dropIfExists('blog_articles_categories');
        Schema::dropIfExists('blog_tags');
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('blog_articles');
    }
}
