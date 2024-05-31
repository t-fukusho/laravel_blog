<head>
    <link rel="stylesheet" href="/css/mypage.css">
</head>
<div class="container">
    <h3><a href="/blog/mypage/{{$id}}">マイページ</a></h3>
</div>
<h3>投稿した記事</h3>
<div class="flex" style="justify-content: center;">
    @foreach ($articles as $article)
        <ul class="article">
            <li><a href="/blog/article/{{ $article->id }}" class="link">{{ $article->title }}</a></li>
            <li>{{ $article->content }}</li>
            <li>
                <img src="{{ $article->icon_path }}" onError="this.onerror=null;this.src='https://tenman.info/labo/css/wp-content/themes/raindrops/images/image-not-found.png'">
                {{ $article->name }} &#9825;{{$article->like_count}}
            </li>
        </ul>
    @endforeach
</div>
{!! $articles->render() !!}
