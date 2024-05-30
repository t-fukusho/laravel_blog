<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        $articles = Article::select("id","title","content")
                            ->where("user_id",$id)
                            ->orderBy('updated_at', 'desc')
                            ->limit(9)
                            ->get();

        $likes = Like::join('articles', 'article_id', '=', 'articles.id')
                    ->select("articles.id","articles.title","content")
                    ->where("likes.user_id",$id)
                    ->orderBy('likes.updated_at', 'desc')
                    ->limit(9)
                    ->get();

        return view('mypage.show',compact("id","articles","likes"));
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
