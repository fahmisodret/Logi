<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('configs')->truncate();
        DB::table('configs')->insert(['name' => 'blog_meta_title', 'keterangan' => 'DSM']);
        DB::table('configs')->insert(['name' => 'blog_meta_author', 'keterangan' => '']);
        DB::table('configs')->insert(['name' => 'blog_meta_description', 'keterangan' => 'PT Dadi Sarana Manunggal']);
        DB::table('configs')->insert(['name' => 'blog_meta_keywords', 'keterangan' => 'blog,articles,estate,developer']);
        DB::table('configs')->insert(['name' => 'blog_meta_robots', 'keterangan' => '']);
        DB::table('configs')->insert(['name' => 'blog_disqus_shortname', 'keterangan' => '']);
        DB::table('configs')->insert(['name' => 'blog_google_analytics_id', 'keterangan' => '']);

    }

}
