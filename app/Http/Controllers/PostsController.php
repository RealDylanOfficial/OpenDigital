<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
