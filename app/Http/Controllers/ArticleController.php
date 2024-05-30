<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;

class ArticleController extends Controller
{

    public function show(Request $request, string $id = null)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $articles = Article::where('is_variable', true)->get();
        if ($request->has('show')) {
            $showTerm = $request->input('show');
            $article = Article::find($showTerm); // Assuming $showTerm contains the ID of the article
            if ($article) {
                return view('article.show', compact('article'));
            } else {
                abort(404); // Article not found
            }
        } else {
            $article = Article::find($id); // Assuming $showTerm contains the ID of the article
            if ($article) {
                return view('article.show', compact('article', 'user_id'));
            } else {
                abort(404); // Article not found
            }
        }
    }

    public function create()
    {
        $article = new Article();
        $user = Auth::user();
        $user_id = $user->id;
        $article = new Article();

        // Assign values to the non-nullable fields
        $article->title = ''; // or any default title
        $article->content = ''; // or any default content
        $article->user_id = $user_id;
        $article->category_id = 1;
        $article->save();
        return view('article.create', compact('article'));
    }
    public function createUpdate(Request $request, string $id = null)
    {
        //dd($request);
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->content = $request->input('category');
        $article->save();
        return redirect()->route('article.show', $article->id);
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
    public function commentStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        // Create a new comment instance
        $comment = new Comment();
        $comment->article_id = $id;
        $comment->user_id = auth()->id(); // Assuming you are using Laravel's authentication
        $comment->comment = $validatedData['comment'];
        $comment->save();
        return redirect()->route('article.show', $id);
    }
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Article::query();
        $query2 = Article::query();
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
            $query2->where('category_id', $request->category_id);
        } else if (isset($request->keyword)) {
            $query->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('content', 'like', '%' . $request->keyword . '%');;
            $query2->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('content', 'like', '%' . $request->keyword . '%');;
        }

        //いいね順
        $articles =  $query->withCount('likes')->with('user')->paginate(10);

        //投稿順
        $articles2 =  $query2->withCount('likes')->with('user')->orderBy('created_at', 'desc')->paginate(10);

        $id = Auth::id();
        $categories = Category::all();
        return view('blog.index', [
            'articles' => $articles,
            'articles2' => $articles2,
            'keyword' => $request->keyword,
            'id' => $id,
            'categories' => $categories,
        ]);
        // $articles = Article::all();
        // return view('blog.index', compact('articles'));
    }
}
