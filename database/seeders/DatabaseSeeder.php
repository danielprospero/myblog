<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\User::truncate();
        \App\Models\Role::truncate();
        \App\Models\Category::truncate();
        \App\Models\Post::truncate();
        \App\Models\Comment::truncate();
        \App\Models\Tag::truncate();
        \App\Models\Image::truncate();
        Schema::enableForeignKeyConstraints();

        $users = \App\Models\User::factory(10)->create();
        foreach ($users as $user) {
            $user->image()->save(\App\Models\Image::factory()->make());
        }
        // \App\Models\Role::factory(1)->create();
        // \App\Models\Role::create(['name' => 'admin']);
        // \App\Models\Category::factory(5)->create();
        $posts = \App\Models\Post::factory(100)->create();
        // \App\Models\Comment::factory(100)->create();
        \App\Models\Tag::factory(10)->create();
        foreach ($posts as $post) {
            $tags_ids = [];
            $tags_ids[] = \App\Models\Tag::all()->random()->id;
            $tags_ids[] = \App\Models\Tag::all()->random()->id;
            $tags_ids[] = \App\Models\Tag::all()->random()->id;

            $post->tags()->sync( $tags_ids );
            $post->image()->save(\App\Models\Image::factory()->make());

        }
        \App\Models\Image::factory(100)->create();
    }
}
