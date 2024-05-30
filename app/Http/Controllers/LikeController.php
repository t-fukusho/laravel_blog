<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $likes = Like::join('articles', 'article_id', '=', 'articles.id')
                    ->select("articles.id","articles.title", DB::Raw("SUBSTRING(articles.content, 1, 10) as content"))
                    ->where("likes.user_id",$id)
                    ->orderBy('likes.updated_at', 'desc')
                    ->get();

        return view('like.index',compact("id","likes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id = null)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $like = new Like();
        $like->user_id = $user_id;
        $like->article_id = $id;
        $like->save();

        $article = Article::findOrFail($id);

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
