<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create()->each(function($user){
        //     $user->Post()->save(App\Models\Post::factory()->create());
        // });
        \App\Models\Post::factory(10)->create();
        // factory('App\Models\User',10)->create();
    }
}
