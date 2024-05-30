<div class="article">
    <h1>新規投稿</h1>
    <form action="{{ route('article.back', ['id' => 0]) }}" method="POST">
        <button type="submit" class="btn btn-primary">戻る</button>
        @csrf
    </form>
    <form action="{{ route('article.createupdate', ['id' => $article->id]) }}" method="POST">
        <p>タイタル</p>
        <div class="form-group">
            <textarea class="form-control" name="title" rows="1">{{ $article->title }}</textarea>
        </div>
        <p>記事コンテント</p>
        <div class="form-group">
            <textarea class="form-control" name="content" rows="8">{{ $article->content}}</textarea>
        </div>
        <p>カテゴリ選んでください</p>
        <ol class="category_list">
            <li>ニュース</li>
            <li>テクノロジー</li>
            <li>エンタテインメント</li>
            <li>スポーツ</li>
            <li>健康</li>
        </ol>
        <div class="form-group">
            <select class="form-control" name="category_id">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" @if ($i == $article->category_id) selected @endif>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
        @csrf
    </form>
</div>
<style>
    .article {
        padding: 20px;
        background-color: #f0f8ff; /* Pale blue color */
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .article h1 {
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 10px;
        background-color: #cfe2f3; /* Slightly darker blue */
        padding: 10px; /* Add padding for better visibility */
        border-radius: 5px; /* Add border radius for a rounded look */
    }

    .category_list {
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #f9f9f9; /* Pale gray color */
        border-radius: 5px;
        margin-top: 10px;
    }

    .category_list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .category_list li {
        margin-right: 10px; /* Adjust spacing between items */
        counter-increment: my-counter; /* Increment the counter for each list item */
    }

    .category_list li:before {
        content: counter(my-counter); /* Display the counter value */
        margin-right: 5px;
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
