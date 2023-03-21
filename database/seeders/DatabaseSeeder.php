<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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
            'username' => "admin",
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('j38*J_)dj@}dksaS&eE9'),
            'created_at' => Carbon::now(),
            'pfp_file_extension' => "jpg"
        ]);
        
        DB::table('users')->insert([
            'username' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('wekjfsnmn'),
            'created_at' => Carbon::now(),
            'pfp_file_extension' => "jpg"
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            "title" => "bird wow",
            "download_count" => 12,
            "file_ext" => ".jpg",
            "content_type" => "image",
            "description" => "Picture of a bird. (Test data: this is not public domain!)",
            "created_at" => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => 2,
            "title" => "Blood, toil, tears and sweat",
            "download_count" => 78,
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
            ->has(Post::factory()->count(20)->sequence(["file_ext" => ".ogg", "content_type" => "audio"],["file_ext" => ".mp4", "content_type" => "video"],["file_ext" => ".pdf", "content_type" => "pdf"])->has(Tag::factory()->sequence(["tag" => "testTag1"], ["tag" => "testTag2"], ["tag" => "testTag3"])))->create();
        
        $users = User::factory()->count(500)->create();

        for ($i=34; $i < 278; $i++) { 
            $like = Like::factory()->sequence(["post_id" => 3,"user_id" => $i])->createOne();
        };
        for ($i=56; $i < 357; $i++) { 
            $like = Like::factory()->sequence(["post_id" => 5,"user_id" => $i])->createOne();
        };
        for ($i=2; $i < 477; $i++) { 
            $like = Like::factory()->sequence(["post_id" => 8,"user_id" => $i])->createOne();
        };
        

        DB::table('comments')->insert([
            "user_id" => 3,
            "post_id" => 1,
            "content" => "woah",
        ]);
        DB::table('comments')->insert([
            "user_id" => 1,
            "post_id" => 1,
            "content" => "it's such a pretty bird!!",
        ]);
        DB::table('comments')->insert([
            "user_id" => 2,
            "post_id" => 3,
            "content" => "I agree!",
        ]);
    }
}
