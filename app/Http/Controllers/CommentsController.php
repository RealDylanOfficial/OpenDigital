<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\SampleController;
use Illuminate\Http\Request;
use App\models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\Middleware;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validator::extend('not_banned_word', function ($attribute, $value, $parameters, $validator) {
        //    $bannedWords = Files::get(resource_path("banned_words.txt"));
        //    $bannedWords = explode(PHP_EOL, $bannedWords);
        
        //    foreach ($bannedWords as $word) {
        //        if (stripos($value, $word) !== false) {
        //            return false;
        //        }
        //    }
        
        //    return true;
        //});
        
        //$this->validate($request, [
        //    "content" => "required|max:500|not_banned_word",
        //]);

        if (Auth::user() == null){
            return redirect()->back()->with("error", "must be logged in to leave a comment");
        }
        $data = $request->all();

        $comment = new Comment;
        $comment->content = $request->input("content");
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $data['postID'];

        $comment->save();

        return redirect()->back()->with("success", "comment left successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('comments.show')->with('comment', $comment);
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
        $query = Comment::query();
        $query->where("id", $id);
        $comment = $query->first();
        if (Auth::user()->id == $comment->user_id){
            $comment->delete();
        }
    }
}
