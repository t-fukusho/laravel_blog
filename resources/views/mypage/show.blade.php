<h1>マイページ</h1>

<h3><a href="/blog/mypage/{{$id}}/edit">プロフィール編集</a></h3>
<h3>投稿した記事</h3>
    @foreach ($articles as $article)
        <ul>
            <li><a href="/blog/article/{{ $article->id }}">{{ $article->title }}</a></li>
            <li><a href="/blog/article/{{ $article->id }}">{{ $article->content }}</a></li>
        </ul>
    @endforeach
    @if (count($articles) >= 9)
        <ul>
            <li><a href="/blog/my_article_list/{{$id}}">もっと見る</a></li>
        </ul>
    @endif

<h3>いいねした記事</h3>
    @foreach ($likes as $like)
        <ul>
            <li><a href="/blog/article/{{ $article->id }}">{{ $like->title }}</a></li>
            <li><a href="/blog/article/{{ $article->id }}">{{ $like->content }}</a></li>
        </ul>
    @endforeach
    @if (count($likes) >= 9)
        <ul>
            <li><a href="/blog/like_list/{{$id}}">もっと見る</a></li>
        </ul>
    @endif
