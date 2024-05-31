
<div class="article">
    <h1>編集 </h1>
    <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
        <p>タイトル</p>
        <div class="form-group">
            <textarea class="form-control" name="title" rows="1">{{ $article->title }}</textarea>
        </div>
        <p>記事コンテント</p>
        <div class="form-group">
            <textarea class="form-control" name="content" rows="8">{{ $article->content }}</textarea>
        </div>
        <p>サムネイル画像</p>
        <div class="form-group">
            <input type="file" name="thumbnail" class="form-control-file">
            @if ($article->thumbnail)
                <img src="{{ asset('thumbnails/' .$article->thumbnail) }}" alt="サムネイル" class="thumbnail-img">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
        @csrf
    </form>
    <p>投稿日: {{ $article->created_at}}</p>
</div>
<style>
    .article {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f0f8ff; /* Pale blue color */
    }

    .article h1 {
        font-size: 24px;
        background-color: #cfe2f3;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .article p {
        margin-bottom: 5px;
    }

    .btn-group {
        margin-bottom: 10px;
    }

    .form-group textarea {
        resize: vertical;
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
    img{
        max-width: 60%;
        height: 70%;
    }
</style>
