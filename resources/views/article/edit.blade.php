<h1>resources/views/article/edit.blade.php</h1>
<div class="article">
    <h1>{{ $article->title }}</h1>
    <form action="{{ route('article.update', $article->id) }}" method="POST">
        <p>タイタル</p>
        <div class="form-group">
            <textarea class="form-control" name="title" rows="1">{{ $article->title }}</textarea>
        </div>
        <p>記事コンテント</p>
        <div class="form-group">
            <textarea class="form-control" name="content" rows="8">{{ $article->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
        @csrf
    </form>
    <p>投稿日: {{ $article->created_at}}</p>
</div>
