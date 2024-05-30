<h1>resources/views/article/create.blade.php</h1>
<div class="article">
    <form action="{{ route('article.createupdate', $article) }}" method="POST">
        <p>タイタル</p>
        <div class="form-group">
            <textarea class="form-control" name="title" rows="1">{{ $article->title ?? '' }}</textarea>
        </div>
        <p>記事コンテント</p>
        <div class="form-group">
            <textarea class="form-control" name="content" rows="8">{{ $article->content ?? ''}}</textarea>
        </div>
        <p>Choose Category</p>
        <div class="form-group">
            <select class="form-control" name="category">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
        @csrf
    </form>
</div>
