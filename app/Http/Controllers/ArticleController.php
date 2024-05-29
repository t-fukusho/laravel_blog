<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     // Bookモデルのオブジェクトを作成
    //     $new_book = new Book();

    //     // リクエストで渡された値を設定
    //     $new_book->title = $request->title;
    //     $new_book->price = $request->price;
    //     $new_book->date = $request->date;

    //     // データベースに保存
    //     $new_book->save();

    //     // 完了画面を表示する（一覧画面にリダイレクト）
    //     return redirect()->route('books.index');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    //     $book = Book::find($id);
    //     return view('books.show', compact('book'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    //     $book = Book::find($id);
    //     return view('books.edit', compact('book'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //


    //     $book = Book::find($id);
    //     /* リクエストで渡された値を設定する */
    //     $book->title = $request->title;
    //     $book->price = $request->price;
    //     $book->date = $request->date;

    //     /* データベースに保存 */
    //     $book->save();


    //     return redirect('/books');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    //     $book = Book::find($id);
    //     $book->delete();

    //     return redirect('/books');
    // }
}
