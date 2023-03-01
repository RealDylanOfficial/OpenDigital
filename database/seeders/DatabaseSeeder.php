<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'username' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('wekjfsnmn'),
            'created_at' => Carbon::now(),
            'profile_picture' => "bird.jpg"
        ]);

        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     "title" => "bird wow",
        //     "download_count" => 12,
        //     "likes" => 1456,
        //     "content_type" => ".jpg",
        //     "description" => "Picture of a bird. (Test data: this is not public domain!)",
        //     "created_at" => Carbon::now(),
        // ]);

        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     "title" => "Blood, toil, tears and sweat",
        //     "download_count" => 78,
        //     "likes" => 32,
        //     "content_type" => ".mp3",
        //     "description" => "Speech by Winston Churchill. Made to the House of Commons on the 13th of May 1940.",
        //     "created_at" => Carbon::now(),
        // ]);

        // DB::table('tags')->insert([
        //     "tag" => "image"
        // ]);

        // DB::table('tags_relation')->insert([
        //     "post_id" => 1,
        //     "tag_id" => 1,
        // ]);

    }
}
