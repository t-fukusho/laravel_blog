<h1>resources/views/article/show.blade.php</h1>
<form action="{{ route('article.back', ['id' => $article->id]) }}" method="POST">
    <button type="submit" class="btn btn-primary">戻る</button>
    @csrf
</form>
<div class="article">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <p>カテゴリ：{{ $article->category_id }}</p>
    <p>投稿日: {{ $article->created_at}}</p>
    <p>更新日: {{ $article->updated_at}}</p>
</div>
@if(Auth::check() && $article->user_id == Auth::user()->id)
    <form action="{{ route('article.edit', ['id' => $article->id]) }}" method="POST">
        <button type="submit" class="btn btn-primary">編集</button>
        @csrf
    </form>
    <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('本当に削除しますか？\r\nあなたの書いた記事が削除されます。\r\nこの操作は取り消せません。')">削除</button>
    </form>
@endif

<form action="{{ route('like.store', ['id' => $article->id]) }}" method="POST">
    <button type="submit" class="btn btn-primary">いいね</button>
    @csrf
</form>

<div class="comments">
    <h2>コメント一覧</h2>
    @if ($article->comments->count() > 0)
        <ul class="list-group">
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <strong>user:{{ $comment->user_id }}</strong>
                    <p>{{ $comment->comment }}</p>
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @else
        <p>コメントなし</p>
    @endif
</div>
<form action="{{ route('article.commentStore', ['id' => $article->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <textarea class="form-control" name="comment" rows="3" placeholder="コメント入力してください"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
