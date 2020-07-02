<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call('UsersTableSeeder');

        $this->setFKCheckOff();
        $this->call(ConfigsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ArticlesTagsTableSeeder::class);
        $this->call(ArticlesCategoriesTableSeeder::class);
        $this->setFKCheckOn();
    }

    private function setFKCheckOff()
    {
        switch (DB::getDriverName()) {
            case 'mysql':
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                break;
        }
    }

    private function setFKCheckOn()
    {
        switch (DB::getDriverName()) {
            case 'mysql':
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                break;
        }
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker\Factory::create('en_NZ');
        $user = new User();
        $user->name = $faker->name;
        $user->phone = $faker->tollFreeNumber;
        $user->email = 'admin@admin.com';
        $user->role = 1;
        $user->status = 1;
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->remember_token = Str::random(10);
        $user->save();
        // for ($i = 0; $i < 500; ++$i) {
        //     $user = new User();
        //     $user->name = $faker->name;
        //     $user->email = $faker->unique()->email;
        //     $user->password = Hash::make('secret');
        //     $user->save();
        // }
    }
}