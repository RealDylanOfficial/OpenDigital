<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = request("tags");
        $type = request("type");
        $date = request("date");
        $search = request("search");

        $query = Post::query();

        switch ($date) {
            case 'day':
                $range = Carbon::now()->subDay();
                break;
            case 'week':
                $range = Carbon::now()->subWeek();
                break;
            case 'month':
                $range = Carbon::now()->subMonth();
                break;
            case 'year':
                $range = Carbon::now()->subYear();
                break;
            default:
                $range = null;
                break;
        }


        // Filter by tags if $tags is not empty
        if ($tags) {

            // Use a loop to add a whereHas clause for each tag
            foreach ($tags as $tag) {
                $query->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tag', $tag);
                });
            }
        }

        if ($type) {
            $query->Where("content_type", $type);
        }

        if ($date) {
            $query->WhereDate("created_at", ">=", $range);
        }

        // searching

        if ($search) {
            $search = explode(" ", $search);
            for ($i=0; $i < count($search); $i++) { 
                $term = $search[$i];
                $query->Where("title", "LIKE", "%$term%");
                $query->orWhere("description", "LIKE", "%$term%");
            }
        }

        // DB::connection()->enableQueryLog();
        $posts = $query->get();
        
        // $queries = DB::getQueryLog();
        // $last_query = end($queries);
        // return $queries;
        // $posts = Post::all();
        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request;
        
        $this->validate($request, [
            "title" => "required|max:255",
            "description" => "required|max:500",
            "tags" => "required|max:250",
            "file" => "mimetypes:application/pdf,image/png,image/jpeg,audio/mpeg,audio/x-wav,video/mp4|required",
            
        ]);
        
        $tags = $request["tags"];
        $tags = explode(",", $tags);
        $tags = array_map("trim", $tags);

        Validator::validate($tags, [
            "*" => "max:32"
            
        ], ["One of the tags was greater than 32 characters"]);

        $tags = array_map("strtolower", $tags);

        $post = new Post;
        $post->title = $request->input("title");
        $post->description = $request->input("description");
        $post->download_count = 0;
        $post->likes = 0;
        $post->user_id = 1;

        $file_type = $request->file("file")->getMimeType();

        if ($file_type == "application/pdf") {
            $content_type = "pdf";
            $file_ext = ".pdf";
        }
        else if($file_type == "image/jpeg"){
            $content_type = "image";
            $file_ext = ".jpeg";
        }
        else if($file_type == "image/png"){
            $content_type = "image";
            $file_ext = ".png";
        }
        else if($file_type == "audio/x-wav"){
            $content_type = "audio";
            $file_ext = ".wav";
        }
        else if($file_type == "audio/mpeg"){
            $content_type = "audio";
            $file_ext = ".mp3";
        }
        else if($file_type == "video/mp4"){
            $content_type = "video";
            $file_ext = ".mp4";
        }

        $post->content_type = $content_type;
        $post->file_ext = $file_ext;

        $post->save();

        for ($i=0; $i < count($tags); $i++) { 
            $query = Tag::where("tag", "=", $tags[$i]);
            $retrievedTag = $query->first();
            if ($retrievedTag == null) {
                $tag = new Tag;
                $tag->tag = $tags[$i];
                $tag->save();
                $tagID = $tag->id;
            } else{
                $tagID = $retrievedTag->id;
            }
            $post->tags()->attach($tagID);
            
        }
        $tag = new Tag;
        $tag->tag = 
        
        $postID = $post->id;
        $filename = "$postID"."$file_ext";
        
        $file = $request->file("file");
        $file->move(public_path("content"), $filename);

        return redirect("/posts")->with("success", "Post created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
