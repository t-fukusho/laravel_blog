<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>
<h3>投稿した記事</h3>
<div class="flex">
    @foreach ($articles as $article)
        <ul>
            <li><a href="/blog/article/{{ $article->id }}">{{ $article->title }}</a></li>
            <li>{{ $article->content }}</li>
        </ul>
    @endforeach
</div>
