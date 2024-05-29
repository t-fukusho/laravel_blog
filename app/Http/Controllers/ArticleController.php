<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function show(Request $request, string $id = null){
        $articles = Article::where('is_variable', true)->get();
        if ($request->has('show')) {
            $showTerm = $request->input('show');
            $article = Article::find($showTerm); // Assuming $showTerm contains the ID of the article
            if ($article) {
                return view('article.show', compact('article'));
            } else {
                abort(404); // Article not found
            }
        }
        else{
            $article = Article::find($id); // Assuming $showTerm contains the ID of the article
            if ($article) {
                return view('article.show', compact('article'));
            } else {
                abort(404); // Article not found
            }
        }
    }

    public function create(Request $request){
        return view('article.create');
    }

    public function edit(string $id = null)
    {
        $article = Article::findOrFail($id);
        //dd($article);
        return view('article.edit', compact('article'));
    }
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();
        return redirect()->route('article.show', $article->id);
    }
    public function like(string $id)
        {
            $user = Auth::user();
            $user_id = $user->id;
            $like = new Like();
            $like->user_id = $user_id;
            $like->article_id = $id;
            $like->save();

            $article = Article::findOrFail($id);

            return view('article.show',compact('article'));
        }

    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->keyword)) {
            $articles = Article::
                where('title','like','%'.$request->keyword.'%')
                ->orWhere('content', 'like','%'.$request->keyword.'%')
                ->withCount('likes')
                ->paginate(10);;
            }
        else {
            $articles = Article::withCount('likes')->paginate(10);
        }

        return view('blog.index', [
            'articles' => $articles,
            'keyword' => $request->keyword
        ]);
        // $articles = Article::all();
        // return view('blog.index', compact('articles'));
    }


}
