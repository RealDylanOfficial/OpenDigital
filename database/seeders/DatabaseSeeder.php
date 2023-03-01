<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password_hash' => 'wekjfsnmn',
            'created_at' => Carbon::now(),
            'profile_picture' => "bird.jpg"
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            "title" => "bird wow",
            "download_count" => 12,
            "likes" => 1456,
            "file_ext" => ".jpg",
            "content_type" => "image",
            "description" => "Picture of a bird. (Test data: this is not public domain!)",
            "created_at" => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            "title" => "Blood, toil, tears and sweat",
            "download_count" => 78,
            "likes" => 32,
            "file_ext" => ".mp3",
            "content_type" => "audio",
            "description" => "Speech by Winston Churchill. Made to the House of Commons on the 13th of May 1940.",
            "created_at" => Carbon::now(),
        ]);

        DB::table('tags')->insert([
            "tag" => "image"
        ]);
        DB::table('tags')->insert([
            "tag" => "bird"
        ]);
        DB::table('tags')->insert([
            "tag" => "speech"
        ]);
        DB::table('tags')->insert([
            "tag" => "nature"
        ]);
        DB::table('tags')->insert([
            "tag" => "historical"
        ]);

        DB::table('post_tag')->insert([
            "post_id" => 1,
            "tag_id" => 1,
        ]);
        DB::table('post_tag')->insert([
            "post_id" => 1,
            "tag_id" => 2,
        ]);
        DB::table('post_tag')->insert([
            "post_id" => 2,
            "tag_id" => 3,
        ]);
        DB::table('post_tag')->insert([
            "post_id" => 1,
            "tag_id" => 4,
        ]);
        DB::table('post_tag')->insert([
            "post_id" => 2,
            "tag_id" => 5,
        ]);
        
        $user = User::factory()
            ->has(Post::factory()->count(20)->sequence(["file_ext" => ".ogg", "content_type" => "audio"],["file_ext" => ".mp4", "content_type" => "video"],["file_ext" => ".pdf", "content_type" => "pdf"]))
            ->create();
    }
}
