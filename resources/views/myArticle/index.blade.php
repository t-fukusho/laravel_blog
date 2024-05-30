<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>
<h3>投稿した記事</h3>
<div class="flex">
    @foreach ($articles as $article)
        <ul class="article">
            <li><a href="/blog/article/{{ $article->id }}" class="link">{{ $article->title }}</a></li>
            <li>{{ $article->content }}</li>
            <li>&#9825;{{$article->like_count}}</li>
        </ul>
    @endforeach
</div>
{!! $articles->render() !!}
