<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        // \App\Models\Post::factory(10)->create();

        User::factory(3)
            ->has(Post::factory()->count(6))
            ->create();

        // \App\Models\Post::factory(6)->create([
        //     'user_id' => 1,
        // ]);
        // \App\Models\Post::factory(6)->create([
        //     'user_id' => 2,
        // ]);

    }
}
