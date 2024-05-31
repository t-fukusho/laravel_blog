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
        $articles = Article::leftJoin('likes', 'articles.id', '=', 'article_id')
                            ->join("users","articles.user_id","=","users.id")
                            ->select("users.name","users.icon_path","articles.id","title","content",DB::RAW("IF(likes.article_id,count('likes.article_id'),0) as like_count"))
                            ->where("articles.user_id",$id)
                            ->groupBy("articles.id")
                            ->limit(9)
                            ->get();

        $likes = DB::table('articles')
                        ->select("users.name","users.icon_path",'articles.id', 'articles.title', 'articles.content', DB::raw('COUNT(likes.article_id) AS like_count'))
                        ->leftJoin('likes', 'articles.id', '=', 'likes.article_id')
                        ->join("users","articles.user_id","=","users.id")
                        ->whereIn('articles.id', function($query) use ($id) {
                            $query->select('article_id')
                                ->from('likes')
                                ->where('user_id', $id);
                        })
                        ->groupBy('articles.id', 'articles.title', 'articles.content')
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
