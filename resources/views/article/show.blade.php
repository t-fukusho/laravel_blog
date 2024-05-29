<h1>resources/views/article/show.blade.php</h1>
<div class="article">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    <p>投稿日: {{ $article->created_at}}</p>
    <p>更新日: {{ $article->updated_at}}</p>
</div>
<form action="{{ route('article.edit', ['id' => $article->id]) }}" method="POST">
    <button type="submit" class="btn btn-primary">編集</button>
    @csrf
</form>
<form action="" method="POST">
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
<form action="" method="POST">
    <div class="comment-box">
        <h3>コメント</h3>
        <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="コメント入力"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </div>
    @csrf
</form>
