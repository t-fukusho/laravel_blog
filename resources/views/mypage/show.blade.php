<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>

<h1>マイページ</h1>

<div class="container">
    <h3><a href="/blog/mypage/{{$id}}/edit">プロフィール編集</a></h3>
</div>

<div class="container">
    <h3>投稿した記事</h3>
    <div class="flex">
        @foreach ($articles as $article)
            <ul>
                <li><a href="/blog/article/{{ $article->id }}" class="link">{{ $article->title }}</a></li>
                <li>{{ $article->content }}</li>
            </ul>
        @endforeach
        @if (count($articles) >= 9)
            <ul>
                <li class="more"><a href="/blog/my_article_list/{{$id}}" class="link">もっと見る</a></li>
            </ul>
        @endif
    </div>
</div>

<div class="container">
    <h3>いいねした記事</h3>
    <div class="flex">
        @foreach ($likes as $like)
            <ul>
                <li><a href="/blog/article/{{ $article->id }}" class="link">{{ $like->title }}</a></li>
                <li>{{ $like->content }}</li>
            </ul>
        @endforeach
        @if (count($likes) >= 9)
            <ul>
                <li class="more"><a href="/blog/like_list/{{$id}}" class="link">もっと見る</a></li>
            </ul>
        @endif
    </div>
</div>

