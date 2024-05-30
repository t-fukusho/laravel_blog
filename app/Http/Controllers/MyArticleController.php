<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $articles = Article::leftJoin('likes', 'articles.id', '=', 'article_id')
                            ->select("articles.id","title","content",DB::RAW("IF(likes.article_id,count('likes.article_id'),0) as like_count"))
                            ->where("articles.user_id",$id)
                            ->groupBy("articles.id")
                            ->limit(9)
                            ->paginate(10);
        //return view('myArticle.index',compact("id","articles"));
        return view("myArticle.index")->with('articles',$articles);
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
    public function store(Request $request)
    {
        //
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
