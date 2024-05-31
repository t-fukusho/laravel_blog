<div class="article-container">
    <h1>記事詳細</h1>
    <form id="backForm" method="POST">
        <button type="button" class="btn btn-primary" onclick="goBack()">戻る</button>
        @csrf
    </form>
    <div class="article">
        <h2>タイトル：{{ $article->title }}</h2>
        <div class="content">
            <h2>内容</h3>
            <p>{{ $article->content }}</p>
        </div>
        <p>カテゴリ：{{ $article->category_id }}</p>
        <p>投稿日: {{ $article->created_at}}</p>
        <p>更新日: {{ $article->updated_at}}</p>
    </div>
    <div class="article-buttons">
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
    </div>

</div>
<div class="comments">
    <h2>コメント一覧</h2>
    @if ($article->comments->count() > 0)
        <ul class="list-group">
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <strong>{{ App\Models\User::find($comment->user_id)->name}}</strong>
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
    <button type="submit" class="btn btn-primary">送信</button>
</form>
<style>
    .article-container {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #f0f8ff; /* Pale blue color */
    }

    .article-container h1 {
        margin-top: 0;
    }

    .article {
        margin-bottom: 20px;
    }

    .article h1 {
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .article p {
        margin-bottom: 5px;
    }

    .btn-group {
        margin-bottom: 10px;
    }

    .comments {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f9f9f9; /* Pale gray color */
        margin-top: 20px;
        border-radius: 5px;
    }

    .comments h2 {
        margin-top: 0;
        margin-bottom: 20px;
    }

    .comment {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .comment p {
        margin-bottom: 5px;
    }

    .comment small {
        color: #888;
    }

    .comment-form {
        margin-top: 20px;
    }

    .form-group textarea {
        resize: vertical;
    }
    .article-buttons {
        display: flex;
        gap: 10px; /* Adjust the space between buttons */
    }

    .article-buttons form {
        margin: 0; /* Remove default form margin */
    }
    .content{
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #d9e6f3; /* Slightly darker than pale blue */
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .content {
        margin: 0;
    }
    .btn {
        background-color: #4e7eb8; /* Dark blue color */
        color: white; /* White text color */
        border: none; /* Remove border */
        padding: 10px 20px; /* Add padding for better size */
        border-radius: 20px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.3s; /* Smooth color transition */
        margin-top: 10px; /* Add margin to the top */
    }

    .btn:hover {
        background-color: #3a5f8e; /* Slightly darker blue color on hover */
    }

</style>
<script>
    function goBack() {
        var previousUrl = document.referrer;
        var previousPageWasEdit = previousUrl.endsWith('/edit');

        if (previousPageWasEdit) {
            window.history.go(-3);
        } else {
            window.history.go(-1);
        }
    }
</script>




